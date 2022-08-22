<a href="javascript:void(0)" class="btn btn-danger" onclick="document.getElementById('logout').submit();">Logout</a>
<form method="post" action="{{ route('logout') }}" id="logout" style="display: none">
    @csrf
</form>
