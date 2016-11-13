<?php /*use iprice\frontend\Util;*/ ?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xml:lang="en" lang="en">
<head>
    <style>
        td {
            text-align: center;
            border: solid 1px #444;
            padding: 1px;
        }
    </style>
</head>
<body>
    <table>
    <tr>
        <td rowspan="2">
            Monitoring items
        </td>
        <td colspan="{{{ count($results) }}}">
            Load by time
        </td>
    </tr>

    <tr>
        @foreach ($results as $result)
        <td>
            {{ $result['time'] }}
        </td>
        @endforeach
    </tr>
    <tr>
        <td>
            CPU Load (%)
        </td>
        @foreach ($results as $result)
        <td>
            {{ $result['cpu'] }}
        </td>
        @endforeach
    </tr>
    <tr>
        <td>
            Memory Load (%)
        </td>
        @foreach ($results as $result)
        <td>
            {{ $result['memory'] }}
        </td>
        @endforeach
    </tr>
    <tr>
        <td>
            HDD Load (MB/s)
        </td>
        @foreach ($results as $result)
        <td>
            {{ $result['hdd'] }}
        </td>
        @endforeach
    </tr>
    </table>
</body>
</html>