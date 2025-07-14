<!-- Author: Nowshin Eza Admin Login page for the Khulna University EDGE Management System-->


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- University Management Menu Item -->
<li class="nav-item">
    <a href="{{ route('university.index') }}" class="nav-link">
        <i class="nav-icon">🏫</i> <!-- University emoji -->
        <p>
            University Management
        </p>
    </a>
</li>

<!-- Course Management Menu Item -->
<li class="nav-item">
    <a href="{{ route('course.index') }}" class="nav-link">
        <i class="nav-icon">📚</i> <!-- Book emoji -->
        <p>
            Course Management
        </p>
    </a>
</li>

<!-- Student Management Menu Item -->
<li class="nav-item">
    <a href="{{ route('student.read') }}" class="nav-link">
        <i class="nav-icon">👨‍🎓</i> <!-- Graduate emoji -->
        <p>
           Student Management
        </p>
    </a>
</li>

<!-- Teacher Type Menu Item -->
<li class="nav-item">
    <a href="{{ route('teacherTypes.index') }}" class="nav-link">
        <i class="nav-icon">👩‍🏫</i> <!-- Teacher emoji -->
        <p>
         Teacher Type
        </p>
    </a>
</li>

<!-- Teacher Menu Item -->
<li class="nav-item">
    <a href="{{ route('teacher.index') }}" class="nav-link">
        <i class="nav-icon">👨‍🏫</i> <!-- Teacher emoji -->
        <p>
            Teacher
        </p>
    </a>
</li>
<!-- Assign Teacher Menu Item -->
<li class="nav-item">
    <a href="{{ route('assign-teacher.show') }}" class="nav-link">
        <i class="nav-icon">📝</i> <!-- Assignment emoji -->
        <p>
            Assign Teacher
        </p>
    </a>
</li>
<!-- Schedule Menu Item -->
<li class="nav-item">
    <a href="{{ route('schedules.index') }}" class="nav-link">
        <i class="nav-icon">📅</i> <!-- Calendar emoji -->
        <p>
            Schedule
        </p>
    </a>
</li>
<!-- Announcement Menu Item -->
<li class="nav-item">
    <a href="{{ route('announcement.index') }}" class="nav-link">
        <i class="nav-icon">📢</i> <!-- Loudspeaker emoji -->
        <p>
            Announcement
        </p>
    </a>
</li>


    </ul>
       
</nav>
<!-- Author: Nowshin Eza Admin Login page for the Khulna University EDGE Management System-->