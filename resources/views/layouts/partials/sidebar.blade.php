 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">
         @php
             $permission_user = App\Models\PermissionRoleModel::getPermission('User', Auth::user()->role_id);
             $permission_role = App\Models\PermissionRoleModel::getPermission('Role', Auth::user()->role_id);
             $permission_category = App\Models\PermissionRoleModel::getPermission('Category', Auth::user()->role_id);
             $permission_sub_category = App\Models\PermissionRoleModel::getPermission(
                 'Sub Category',
                 Auth::user()->role_id,
             );
             $permission_product = App\Models\PermissionRoleModel::getPermission('Product', Auth::user()->role_id);
             $permission_setting = App\Models\PermissionRoleModel::getPermission('Setting', Auth::user()->role_id);
         @endphp


         <li class="nav-item">
             <a class="nav-link @if (Request::segment(2) != 'dashboard') collapsed @endif" href="{{ url('panel/dashboard') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li>
         @if (!empty($permission_user))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'user') collapsed @endif " href="{{ url('panel/user') }}">
                     <i class="bi bi-person"></i>
                     <span>Users</span>
                 </a>
             </li>
         @endif
         @if (!empty($permission_role))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'role') collapsed @endif" href="{{ url('panel/role') }}">
                     <i class="bi bi-person"></i>
                     <span>Role</span>
                 </a>
             </li>
         @endif
         @if (!empty($permission_category))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'category') collapsed @endif"
                     href="{{ url('panel/category') }}">
                     <i class="bi bi-person"></i>
                     <span>Category</span>
                 </a>
             </li>
         @endif
         @if (!empty($permission_sub_category))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'Subcategory') collapsed @endif"
                     href="{{ url('panel/Subcategory') }}">
                     <i class="bi bi-person"></i>
                     <span>Subcategory</span>
                 </a>
             </li>
         @endif
         @if (!empty($permission_product))
             <li class="nav-item">
                 <a class="nav-link @if (Request::segment(2) != 'product') collapsed @endif"
                     href="{{ url('panel/product') }}">
                     <i class="bi bi-person"></i>
                     <span>Product</span>
                 </a>
             </li>
         @endif
         @if (!empty($permission_setting))
         <li class="nav-item">
             <a class="nav-link @if (Request::segment(2) != 'setting') collapsed @endif" href="{{ url('panel/setting') }}">
                 <i class="bi bi-person"></i>
                 <span>Setting</span>
             </a>
         </li>
         @endif

     </ul>

 </aside><!-- End Sidebar-->
