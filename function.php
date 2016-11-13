<?php
function get_config()
{
    $config = require_once 'config.php';
    return $config;
}

function db_connect($config)
{
    $dsn = 'mysql:dbname='. $config['db']['name'] .';host='. $config['db']['host'];
    try
    {
        $pdo = new PDO($dsn, $config['db']['user'], $config['db']['password']);
    } catch (PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        exit();
    }
    return $pdo;
}

function get_measurements()
{
    # get cpu info
    $cpu = 100 * (int)shell_exec(
        "grep 'cpu' /proc/stat | awk '{usage=($2+$4)*100/($2+$4+$5)} END {print usage}'"
    );

    # get mem info
    $total_memory = (int)shell_exec(
        "vmstat -s -S m | awk 'FNR==1 {print $1}'"
    );
    $used_memory = (int)shell_exec(
        "vmstat -s -S m | awk 'FNR==2 {print $1}'"
    );
    $memory = $used_memory * 100 / $total_memory;

    # get hdd info
    if (is_sysstat_installed()) {
        $hdd_device_name = trim(shell_exec(
            "lsblk -d -n --output=NAME -l | awk 'FNR==1 {print $1}'"
        ));
        $hdd_reads = trim(shell_exec(
            "iostat -m -d -x $hdd_device_name | awk 'FNR==4 {print $6}'"
        ));
        $hdd_writes = trim(shell_exec(
            "iostat -m -d -x $hdd_device_name | awk 'FNR==4 {print $7}'"
        ));
        $hdd = $hdd_reads . '/' . $hdd_writes;
    } else {
        $hdd = 'N/N';
    }

    return [
        'cpu' => (int)$cpu,
        'memory' => (int)$memory,
        'hdd' => $hdd
    ];
}

function get_data()
{
    $pdo = db_connect(get_config());
    $stmt = $pdo->prepare(
        "SELECT time, cpu, memory, hdd FROM measurements AS m, time_slots as t WHERE stats_id = m.id LIMIT 20"
    );
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function save_data($cpu, $memory, $disk)
{
    $pdo = db_connect(get_config());
    $date = new DateTime;
    $time = $date->format("H:i");
    $stmt = $pdo->prepare("INSERT INTO measurements (cpu, memory, hdd) VALUES (:cpu, :memory, :hdd)");
    $stmt->bindParam(":cpu", $cpu);
    $stmt->bindParam(":memory", $memory);
    $stmt->bindParam(":hdd", $disk);
    $stmt->execute();
    $id = $pdo->lastInsertId();
    $stmt = $pdo->prepare("INSERT INTO time_slots (time, stats_id) VALUES (:time, :stats_id)");
    $stmt->bindParam(":time", $time);
    $stmt->bindParam(":stats_id", $id);
    $stmt->execute();
}

function is_sysstat_installed() {
    if ((int)shell_exec("command iostat >>/dev/null 2>&1 ; echo $?") !== 0) {
        return false;
    }
    return true;
}
