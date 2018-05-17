<html>
    <head>
        <title>A Domain Status update</title>
    </head>
    <body>
        <?php
            $domain = '';
            $status = '';

            if (!empty($available)) {
                $domain = $available[0];
                $status = "Available";
            } else if (!empty($unavailable)) {
                $domain = $unavailable[0];
                $status = "Unavailable";
            }
        ?>
        Domain Reminder has detected that <b>{{$domain}}</b> status has changed to <b>{{$status}}</b>
    </body>
</html>