<nav class="nav flex-column">
    @foreach($list as $row)
    <a class="nav-link {{$isAcvtive($row['label']) ? 'active' : ''}}" href="#">
        {{$row['label']}}
    </a>
    @endforeach
</nav>