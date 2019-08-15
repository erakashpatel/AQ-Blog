<style>
    /*.footer {*/
    /*    position: fixed;*/
    /*    bottom: 0;*/
    /*    width: 100%;*/
    /*    height: 50px;*/
    /*}*/

    html, body {
        margin-bottom: 50px;
    }
</style>

<footer class="navbar navbar-light navbar-expand-lg fixed-bottom">
   <div class="container-fluid">
       <ul class="nav navbar-nav list-inline">
           <li class="list-inline-item text-muted"><a>Copyright &copy; {!! date('Y') !!}, {{ env('APP_AUTHORS') }}</a></li>
       </ul>
   </div>
</footer>
