<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('admin')}}" class="nav-link">
                    <i class="ion ion-stats-bars mr-1 ml-2"></i>
                    <p>
                        Статистика
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="ion ion-person-add mr-1 ml-2"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.post.index')}}" class="nav-link">
                    <i class="ion ion-bag mr-1 ml-2"></i>
                    <p>
                        Посты
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                    <i class="ion ion-stats-bars mr-1 ml-2"></i>
                    <p>
                        Категории
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.tag.index')}}" class="nav-link">
                    <i class="ion ion-pie-graph mr-1 ml-2"></i>
                    <p>
                        Тэги
                    </p>
                </a>
            </li>

        </ul>

    </div>
    <!-- /.sidebar -->
</aside>

