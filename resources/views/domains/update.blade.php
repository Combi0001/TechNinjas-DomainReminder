<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Domains</title>
</head>
<body>
    <form action="/domains/update" method="post">
        @csrf
        @foreach($user->domains as $domain)
            <label style="display:block;">
                {{$domain->domain}}
                <select name="domains[{{$domain->id}}]">
                    <option value="AVAILABLE" <?php echo ($domain->status === "AVAILABLE") ? "selected" : ""?>>
                        Available
                    </option>
                    <option value="UNAVAILABLE" <?php echo ($domain->status === "UNAVAILABLE") ? "selected" : ""?>>
                        Unavailable
                    </option>
                    <option value="QUEUED" <?php echo ($domain->status === "QUEUED") ? "selected" : ""?>>
                        Queued
                    </option>
                    <option value="UNSUPPORTED" <?php echo ($domain->status === "UNSUPPORTED") ? "selected" : ""?>>
                        Unsupported
                    </option>
                </select>
            </label>
        @endforeach
        <input type="submit" value="Update">
    </form>
</body>
</html>