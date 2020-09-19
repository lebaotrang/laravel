<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </head>
  <body>
    <h3>Data</h3>
    <table class="table table-bordered">
      <tr>
        <td>
          Title
        </td>
        <td>
          Length
        </td>
      </tr>
      @foreach($data as $key => $user)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$user['fact']}}</td>
        </tr>
        @endforeach
    </table>
  </body>
</html>