<?php /*use iprice\frontend\Util;*/ ?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html" xml:lang="en" lang="en">
<head>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
    <tr>
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
        @foreach ($results as $result)
        <td>
            {{ $result['cpu'] }}
        </td>
        @endforeach
    </tr>
    <tr>
        @foreach ($results as $result)
        <td>
            {{ $result['memory'] }}
        </td>
        @endforeach
    </tr>
    <tr>
        @foreach ($results as $result)
        <td>
            {{ $result['hdd'] }}
        </td>
        @endforeach
    </tr>
    </table>
</body>
</html>