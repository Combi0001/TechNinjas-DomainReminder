<html>
    <head>
        <title>Multiple Domains status updated</title>
    </head>
    <body>
        <h3>Domain Reminder has detected multiple domains have changed status</h3>
        @if (!empty($available))
            The following domains have changed to <b>Available</b>:
            <ul>
            @foreach($available as $domain)
                <li>{{$domain}}</li>
            @endforeach
            </ul>
        @endif
        @if (!empty($unavailable))
            The following domains have changed to <b>Unavailable</b>:
            <ul>
                @foreach($unavailable as $domain)
                    <li>{{$domain}}</li>
                @endforeach
            </ul>
        @endif
    </body>
</html>