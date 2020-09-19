<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
    <h3>User Info</h3>
    <table class="table table-bordered">
      <tr>
        <td>
          {{$user->full_name}}
        </td>
        <td>
          {{$user->street_address}}
        </td>
      </tr>
      <tr>
        <td>
          {{$user->city}}
        </td>
        <td>
          {{$user->zip_code}}
        </td>
      </tr>
    </table>
  </body>
</html>