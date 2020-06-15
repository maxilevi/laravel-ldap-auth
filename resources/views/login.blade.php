<html>

<center>
    <form action="/processLDAPLogin" method="POST">
        {{ csrf_field() }}
    <label for="username">Username:</label>
        <br>
    <input type="text" name="username" value="" />
        <br>
        <br>
    <label for="password">Password:</label>
        <br>
    <input type="password" name="password" value="" />
        <br>
        <br>
        <input type="submit" value="Submit" />
    </form>
    <br>
    <br>
    <span color="red">{{ isset($error) ? $error : '' }}</span>
</center>

</html>
