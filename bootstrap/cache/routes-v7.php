<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/nagad/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'nagad.callback',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/authorize' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.authorize',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'passport.authorizations.deny',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/token/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.token.refresh',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/clients' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/scopes' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.scopes.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/oauth/personal-access-tokens' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v4/users/all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7Pm1CzoECTFK5ngQ',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2R55IdQnJjnYQCvT',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v4/details' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'api.generated::OEB5NyB8mQHWXrjp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin_login/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth.loginAdmin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin_login/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.auth.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s9vxUKSdaEOFSyOp',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata-stats' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.stats',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/alladmin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.admin.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/alladmin/get' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.alladmin.admin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.profile',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/edit_profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/change_password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.password_change',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.change_password',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/allUser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.allUser.users',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/allUserAdmin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.allUser.admin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/allUserAdminShow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.allUser.admin.show',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.export',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/permissions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/allPermissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.allPermissions',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/allRoles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.allRoles',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/settings/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/allSettings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.allSettings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/page_content' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.page_content',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/page_content/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.page_content_update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/general' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.general',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/address' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.address',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/education' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.education',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/family' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.family',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/personal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.personal',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/professional' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.professional',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/marrage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.marrage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/expected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.expected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/commitment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.commitment',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.contact',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.pending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/approved' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.approved',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/suspected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.suspected',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/married' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.married',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/deleted' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.deleted',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/incomplete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.incomplete',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/request_pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.request_pending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/request_delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.request_delete',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/my' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.my_biodata',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/my/biodata_pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.my_biodata_pending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/approve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.ApproveIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/verify' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.VerifyIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/data/request_pending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.request_pendingData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/data/request_delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.request_deleteData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/data/allMyData' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.allMyData',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/data/allMyDataPending' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.allMyDataPending',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/data/approve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.approve',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/data/verfiy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.verify',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/data/trash' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.trash',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/data/my/trash' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.my_trash',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/trash' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.trashIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata/user_trash' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.trashUserIndex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/transactions_history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions_history.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/transactions_history_list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions_history.all',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contact_form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.contact_form.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/contact_form_list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.contact_form.all',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata_report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata_report.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/biodata_report_list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata_report.all',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/packages/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.packages.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/packages/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.packages.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/packages/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.packages.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/packages_list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.packages.all',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/faqs/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.faqs.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/faqs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.faqs.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/faqs/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.faqs.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/faqs_list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.faqs.all',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/guides/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.guides.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/guides/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.guides.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/guides/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.guides.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/guides_list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.guides.all',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/coupons/index' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.coupons.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/coupons/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.coupons.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/coupons/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.coupons.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/coupons_list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.coupons.all',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/divisions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/biodata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.biodata',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/general' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.general',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/address' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.address',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/education' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.education',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/family' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.family',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/personal' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.personal',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/professional' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.professional',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/marrage' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.marrage',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/expected' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.expected',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/commitment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.commitment',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/edit_biodata/contact' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.edit_biodata.contact',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/my_biodata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.my_biodata',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/favourite' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.favourite',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/my_purchases' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.my_purchases',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.settings',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/change_password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.change_password',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/delete_biodata' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.delete_biodata_page',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.delete_biodata',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/buy_connection' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.buy_connection',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/connection_bkash/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.bkash_callback',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/bkash/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.bkash.callback',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/bkash/execute-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.bkash.execute',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/favourite/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.favourite.update',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/favourite/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.favourite.delete',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user/apply_coupon' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.apply_coupon',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user_login/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.auth.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.auth.loginUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user_login/otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.auth.otpGet',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.auth.otp',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user_login/registration' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.auth.registration',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'user.auth.registerUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user_login/existingUserLogin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.auth.existingUserLogin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user_login/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.auth.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'UserRegister',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/unavailable' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'hard_unavailable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/database_reform' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'database_reform',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MYBukfim82bmqc3S',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/searchSubmit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.searchSubmit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.search',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/mission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.mission',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/vision' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.vision',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/terms_of_service' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.tos',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin_info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.admin_info',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/auth/google' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.googleLogin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/customer/auth/google/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.googleLoginCB',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/auth/facebook' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.facebookLogin',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/auth/facebook/callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/privacy_policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.privacy_policy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/refund_policy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.refund_policy',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/achievement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.achievement',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/faq' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.faq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/contact_us' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.contact_us',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/contact_submission' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.contact_submission',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/about_us' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.about_us',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guide' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.guide',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/nagad(?|/([^/]++)/([^/]++)(*:34)|\\-payment/([^/]++)/(?|success(*:70)|fail(*:81)))|/oauth/(?|tokens/([^/]++)(*:115)|clients/([^/]++)(?|(*:142))|personal\\-access\\-tokens/([^/]++)(*:184))|/admin/(?|users/([^/]++)(?|(*:220)|/edit(*:233)|(*:241))|p(?|ermissions/([^/]++)(?|(*:276)|/edit(*:289)|(*:297))|ackages/(?|edit/([^/]++)(*:330)|update/([^/]++)(*:353)|destroy/([^/]++)(*:377)))|roles/([^/]++)(?|(*:404)|/edit(*:417)|(*:425))|settings/([^/]++)(?|(*:454)|/edit(*:467)|(*:475))|biodata(?|/(?|a(?|ll/([^/]++)(*:513)|pprove/([^/]++)(*:536))|my/(?|biodataPrint/([^/]++)(*:572)|BiodataDistroy/([^/]++)(*:603))|d(?|ata/myDataEdit/([^/]++)(*:639)|e(?|story/([^/]++)(*:665)|lete_modal/([^/]++)(*:692)))|softdestroy/([^/]++)(*:722)|reverse/([^/]++)(*:746)|view/([^/]++)(*:767)|edit(?|/([^/]++)(*:791)|_status/([^/]++)(*:815))|update(?|_status/([^/]++)(*:849)|/([^/]++)(*:866))|featured/([^/]++)(*:892))|_report/([^/]++)(*:917))|faqs/(?|edit/([^/]++)(*:947)|update/([^/]++)(*:970)|destroy/([^/]++)(*:994))|guides/(?|edit/([^/]++)(*:1026)|update/([^/]++)(*:1050)|destroy/([^/]++)(*:1075))|coupons/(?|edit/([^/]++)(*:1109)|update/([^/]++)(*:1133)|destroy/([^/]++)(*:1158)))|/user/(?|districts/([^/]++)(*:1196)|u(?|pazilas/([^/]++)(*:1225)|se_connection/([^/]++)(*:1256))|connection(?|/([^/]++)(*:1288)|_buy_(?|bkash/([^/]++)(*:1319)|nagad/([^/]++)(*:1342)))|biodata_report/([^/]++)(*:1376))|/biodata_details/([^/]++)(*:1411)|/lang/([^/]++)(*:1434))/?$}sDu',
    ),
    3 => 
    array (
      34 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UKieBJl2SuYjHzMm',
          ),
          1 => 
          array (
            0 => 'reference_id',
            1 => 'amount',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      70 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::pw6s9ofgA12hVzVs',
          ),
          1 => 
          array (
            0 => 'transaction_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      81 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ACTGaiagKXtJhTGl',
          ),
          1 => 
          array (
            0 => 'transaction_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      115 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.update',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'passport.clients.destroy',
          ),
          1 => 
          array (
            0 => 'client_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      184 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'passport.personal.tokens.destroy',
          ),
          1 => 
          array (
            0 => 'token_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      220 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      241 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      276 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.show',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      289 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.edit',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      297 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.update',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.permissions.destroy',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      330 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.packages.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      353 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.packages.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      377 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.packages.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      404 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      417 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      425 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.roles.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      454 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.show',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      467 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.edit',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      475 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.update',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.destroy',
          ),
          1 => 
          array (
            0 => 'setting',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      513 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.all',
          ),
          1 => 
          array (
            0 => 'page',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      536 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      572 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.my_biodataPrint',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      603 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.myBiodataDistroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      639 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.myDataEdit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      692 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.delete_modal',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      722 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.softdestroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      746 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.reverse',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.view',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      791 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      815 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.edit_status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      849 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.update_status',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      866 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      892 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata.featured',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      917 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.biodata_report.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      947 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.faqs.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      970 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.faqs.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      994 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.faqs.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1026 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.guides.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1050 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.guides.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1075 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.guides.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1109 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.coupons.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1133 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.coupons.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1158 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.coupons.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1196 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.generated::s5GdxUTSOzAe1cff',
          ),
          1 => 
          array (
            0 => 'division_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1225 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.generated::nyBebsKOcyxVGtHF',
          ),
          1 => 
          array (
            0 => 'district_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1256 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.use_connection',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1288 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.connection',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1319 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.connection_buy_bkash',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1342 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.connection_buy_nagad',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1376 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'user.biodata_report',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1411 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.biodata_details',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'frontend.lang',
          ),
          1 => 
          array (
            0 => 'prefix',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::UKieBJl2SuYjHzMm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nagad/{reference_id}/{amount}',
      'action' => 
      array (
        'uses' => 'Nrbsolution\\nagad_payment_gateway\\Http\\Controllers\\NagadPaymentGatewayController@NagadPay',
        'controller' => 'Nrbsolution\\nagad_payment_gateway\\Http\\Controllers\\NagadPaymentGatewayController@NagadPay',
        'as' => 'generated::UKieBJl2SuYjHzMm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'nagad.callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nagad/callback',
      'action' => 
      array (
        'uses' => 'Nrbsolution\\nagad_payment_gateway\\Http\\Controllers\\NagadPaymentGatewayController@NagadCallback',
        'controller' => 'Nrbsolution\\nagad_payment_gateway\\Http\\Controllers\\NagadPaymentGatewayController@NagadCallback',
        'as' => 'nagad.callback',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::pw6s9ofgA12hVzVs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nagad-payment/{transaction_id}/success',
      'action' => 
      array (
        'uses' => 'Nrbsolution\\nagad_payment_gateway\\Http\\Controllers\\NagadPaymentGatewayController@success',
        'controller' => 'Nrbsolution\\nagad_payment_gateway\\Http\\Controllers\\NagadPaymentGatewayController@success',
        'as' => 'generated::pw6s9ofgA12hVzVs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ACTGaiagKXtJhTGl' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'nagad-payment/{transaction_id}/fail',
      'action' => 
      array (
        'uses' => 'Nrbsolution\\nagad_payment_gateway\\Http\\Controllers\\NagadPaymentGatewayController@fail',
        'controller' => 'Nrbsolution\\nagad_payment_gateway\\Http\\Controllers\\NagadPaymentGatewayController@fail',
        'as' => 'generated::ACTGaiagKXtJhTGl',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.authorize' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'as' => 'passport.authorizations.authorize',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.approve' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'as' => 'passport.authorizations.approve',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.authorizations.deny' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/authorize',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'as' => 'passport.authorizations.deny',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token',
      'action' => 
      array (
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'as' => 'passport.token',
        'middleware' => 'throttle',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'as' => 'passport.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'as' => 'passport.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.token.refresh' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/token/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'as' => 'passport.token.refresh',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'as' => 'passport.clients.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/clients',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'as' => 'passport.clients.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'as' => 'passport.clients.update',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@update',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.clients.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/clients/{client_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'as' => 'passport.clients.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.scopes.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/scopes',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'as' => 'passport.scopes.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'as' => 'passport.personal.tokens.index',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'oauth/personal-access-tokens',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'as' => 'passport.personal.tokens.store',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'passport.personal.tokens.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'oauth/personal-access-tokens/{token_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'uses' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'as' => 'passport.personal.tokens.destroy',
        'controller' => '\\Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
        'namespace' => '\\Laravel\\Passport\\Http\\Controllers',
        'prefix' => 'oauth',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v4/users/all',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:admin_api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Backend\\UserApiController@index',
        'controller' => 'App\\Http\\Controllers\\Api\\Backend\\UserApiController@index',
        'as' => 'api.',
        'namespace' => 'App\\Http\\Controllers\\Api\\Backend',
        'prefix' => 'api/v4',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7Pm1CzoECTFK5ngQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::7Pm1CzoECTFK5ngQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::2R55IdQnJjnYQCvT' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@register',
        'controller' => 'App\\Http\\Controllers\\Api\\Auth\\AuthController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2R55IdQnJjnYQCvT',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'api.generated::OEB5NyB8mQHWXrjp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v4/details',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:api',
        ),
        'uses' => 'App\\Http\\Controllers\\Api\\Backend\\UserApiController@details',
        'controller' => 'App\\Http\\Controllers\\Api\\Backend\\UserApiController@details',
        'as' => 'api.generated::OEB5NyB8mQHWXrjp',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => 'api/v4',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.auth.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin_login/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\Admin\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\Admin\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin_login',
        'where' => 
        array (
        ),
        'as' => 'admin.auth.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.auth.loginAdmin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin_login/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\Admin\\LoginController@loginAdmin',
        'controller' => 'App\\Http\\Controllers\\Auth\\Admin\\LoginController@loginAdmin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin_login',
        'where' => 
        array (
        ),
        'as' => 'admin.auth.loginAdmin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin_login/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\Admin\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\Admin\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin_login',
        'where' => 
        array (
        ),
        'as' => 'admin.auth.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s9vxUKSdaEOFSyOp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin_login/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\Admin\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\Admin\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/admin_login',
        'where' => 
        array (
        ),
        'as' => 'generated::s9vxUKSdaEOFSyOp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\DashboardController@index',
        'as' => 'admin.dashboard',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.stats' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata-stats',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\DashboardController@getBiodataStats',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\DashboardController@getBiodataStats',
        'as' => 'admin.biodata.stats',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.admin.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/alladmin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@alladmin',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@alladmin',
        'as' => 'admin.admin.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.alladmin.admin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/alladmin/get',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@alladminGet',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@alladminGet',
        'as' => 'admin.alladmin.admin',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.profile' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@profile',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@profile',
        'as' => 'admin.profile',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/edit_profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@edit',
        'as' => 'admin.edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/edit_profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@update',
        'as' => 'admin.update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.password_change' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/change_password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@change_password',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@change_password',
        'as' => 'admin.password_change',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.change_password' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/change_password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@update_password',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\AdminController@update_password',
        'as' => 'admin.change_password',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.users.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.users.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.users.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.users.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@show',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/users/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.users.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.users.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.users.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.allUser.users' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/allUser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@getAll',
        'as' => 'admin.allUser.users',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.allUser.admin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/allUserAdmin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@allUserAdmin',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@allUserAdmin',
        'as' => 'admin.allUser.admin',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.allUser.admin.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/allUserAdminShow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@allUserAdminShow',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@allUserAdminShow',
        'as' => 'admin.allUser.admin.show',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@export',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\UserController@export',
        'as' => 'admin.export',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.permissions.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.permissions.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.permissions.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.permissions.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@show',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/permissions/{permission}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.permissions.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.permissions.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.permissions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.permissions.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.allPermissions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/allPermissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PermissionController@getAll',
        'as' => 'admin.allPermissions',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.roles.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.roles.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.roles.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.roles.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@show',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/roles/{role}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.roles.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.roles.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.roles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.roles.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.allRoles' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/allRoles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\RoleController@getAll',
        'as' => 'admin.allRoles',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.settings.index',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.settings.create',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.settings.store',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/{setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.settings.show',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@show',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@show',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/settings/{setting}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.settings.edit',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'admin/settings/{setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.settings.update',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/settings/{setting}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'as' => 'admin.settings.destroy',
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.allSettings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/allSettings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@getAll',
        'as' => 'admin.allSettings',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.page_content' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/page_content',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@page_content',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@page_content',
        'as' => 'admin.settings.page_content',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.page_content_update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/page_content/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@page_content_update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\SettingsController@page_content_update',
        'as' => 'admin.settings.page_content_update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@create',
        'as' => 'admin.biodata.create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@biodata_store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@biodata_store',
        'as' => 'admin.biodata.store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.general' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/general',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@general',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@general',
        'as' => 'admin.biodata.general',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.address' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/address',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@address',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@address',
        'as' => 'admin.biodata.address',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.education' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/education',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@education',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@education',
        'as' => 'admin.biodata.education',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.family' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/family',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@family',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@family',
        'as' => 'admin.biodata.family',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.personal' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/personal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@personal',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@personal',
        'as' => 'admin.biodata.personal',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.professional' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/professional',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@professional',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@professional',
        'as' => 'admin.biodata.professional',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.marrage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/marrage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@marrage',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@marrage',
        'as' => 'admin.biodata.marrage',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.expected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/expected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@expected',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@expected',
        'as' => 'admin.biodata.expected',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.commitment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/commitment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@commitment',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@commitment',
        'as' => 'admin.biodata.commitment',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.contact' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@contact',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@contact',
        'as' => 'admin.biodata.contact',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.pending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@pending',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@pending',
        'as' => 'admin.biodata.pending',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.approved' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/approved',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@approved',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@approved',
        'as' => 'admin.biodata.approved',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.suspected' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/suspected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@suspected',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@suspected',
        'as' => 'admin.biodata.suspected',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.married' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/married',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@married',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@married',
        'as' => 'admin.biodata.married',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.deleted' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/deleted',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@deleted',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@deleted',
        'as' => 'admin.biodata.deleted',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.incomplete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/incomplete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@incomplete',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@incomplete',
        'as' => 'admin.biodata.incomplete',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/all/{page}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@getAll',
        'as' => 'admin.biodata.all',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.request_pending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/request_pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@request_pending',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@request_pending',
        'as' => 'admin.biodata.request_pending',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.request_delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/request_delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@request_delete',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@request_delete',
        'as' => 'admin.biodata.request_delete',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.my_biodata' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/my',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@my_biodata',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@my_biodata',
        'as' => 'admin.biodata.my_biodata',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.my_biodata_pending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/my/biodata_pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@my_biodata_pending',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@my_biodata_pending',
        'as' => 'admin.biodata.my_biodata_pending',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.my_biodataPrint' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/my/biodataPrint/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@my_biodataPrint',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@my_biodataPrint',
        'as' => 'admin.biodata.my_biodataPrint',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.ApproveIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@ApproveIndex',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@ApproveIndex',
        'as' => 'admin.biodata.ApproveIndex',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.VerifyIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/verify',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@VerifyIndex',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@VerifyIndex',
        'as' => 'admin.biodata.VerifyIndex',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.request_pendingData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/request_pending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@request_pendingData',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@request_pendingData',
        'as' => 'admin.biodata.request_pendingData',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.request_deleteData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/request_delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@request_deleteData',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@request_deleteData',
        'as' => 'admin.biodata.request_deleteData',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.allMyData' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/allMyData',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@allMyData',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@allMyData',
        'as' => 'admin.biodata.allMyData',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.allMyDataPending' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/allMyDataPending',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@allMyDataPending',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@allMyDataPending',
        'as' => 'admin.biodata.allMyDataPending',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.myDataEdit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/myDataEdit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@myDataEdit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@myDataEdit',
        'as' => 'admin.biodata.myDataEdit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.approve' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@approveData',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@approveData',
        'as' => 'admin.biodata.approve',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/verfiy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@VerifyData',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@VerifyData',
        'as' => 'admin.biodata.verify',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.trash' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/trash',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@trashData',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@trashData',
        'as' => 'admin.biodata.trash',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.my_trash' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/data/my/trash',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@UsertrashData',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@UsertrashData',
        'as' => 'admin.biodata.my_trash',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.trashIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/trash',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@trashIndex',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@trashIndex',
        'as' => 'admin.biodata.trashIndex',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.trashUserIndex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/user_trash',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@trashUserIndex',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@trashUserIndex',
        'as' => 'admin.biodata.trashUserIndex',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/biodata/destory/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@destroy',
        'as' => 'admin.biodata.destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.delete_modal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/delete_modal/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@delete_modal',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@delete_modal',
        'as' => 'admin.biodata.delete_modal',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.softdestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/biodata/softdestroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@softdestroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@softdestroy',
        'as' => 'admin.biodata.softdestroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.myBiodataDistroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/biodata/my/BiodataDistroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@myBiodataDistroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@myBiodataDistroy',
        'as' => 'admin.biodata.myBiodataDistroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/approve/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@approve',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@approve',
        'as' => 'admin.',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.reverse' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/reverse/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@reverse',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@reverse',
        'as' => 'admin.biodata.reverse',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/view/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@view',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@view',
        'as' => 'admin.biodata.view',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@edit',
        'as' => 'admin.biodata.edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.edit_status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/edit_status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@edit_status',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@edit_status',
        'as' => 'admin.biodata.edit_status',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.update_status' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/update_status/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@update_status',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@update_status',
        'as' => 'admin.biodata.update_status',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/biodata/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@update',
        'as' => 'admin.biodata.update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata.featured' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata/featured/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@featured',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BioDataController@featured',
        'as' => 'admin.biodata.featured',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions_history.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/transactions_history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\TransactionController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\TransactionController@index',
        'as' => 'admin.transactions_history.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions_history.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/transactions_history_list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\TransactionController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\TransactionController@getAll',
        'as' => 'admin.transactions_history.all',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.contact_form.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contact_form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\ContactFormController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\ContactFormController@index',
        'as' => 'admin.contact_form.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.contact_form.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/contact_form_list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\ContactFormController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\ContactFormController@getAll',
        'as' => 'admin.contact_form.all',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata_report.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata_report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BiodataReportController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BiodataReportController@index',
        'as' => 'admin.biodata_report.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata_report.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata_report_list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BiodataReportController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BiodataReportController@getAll',
        'as' => 'admin.biodata_report.all',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.biodata_report.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/biodata_report/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\BiodataReportController@delete',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\BiodataReportController@delete',
        'as' => 'admin.biodata_report.delete',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.packages.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/packages/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@index',
        'as' => 'admin.packages.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.packages.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/packages/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@create',
        'as' => 'admin.packages.create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.packages.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/packages/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@store',
        'as' => 'admin.packages.store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.packages.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/packages/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@edit',
        'as' => 'admin.packages.edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.packages.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/packages/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@update',
        'as' => 'admin.packages.update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.packages.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/packages/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@destroy',
        'as' => 'admin.packages.destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.packages.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/packages_list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\PackagesController@getAll',
        'as' => 'admin.packages.all',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.faqs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/faqs/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@index',
        'as' => 'admin.faqs.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.faqs.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/faqs/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@create',
        'as' => 'admin.faqs.create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.faqs.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/faqs/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@store',
        'as' => 'admin.faqs.store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.faqs.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/faqs/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@edit',
        'as' => 'admin.faqs.edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.faqs.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/faqs/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@update',
        'as' => 'admin.faqs.update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.faqs.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/faqs/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@destroy',
        'as' => 'admin.faqs.destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.faqs.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/faqs_list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\FaqController@getAll',
        'as' => 'admin.faqs.all',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.guides.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/guides/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@index',
        'as' => 'admin.guides.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.guides.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/guides/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@create',
        'as' => 'admin.guides.create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.guides.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/guides/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@store',
        'as' => 'admin.guides.store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.guides.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/guides/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@edit',
        'as' => 'admin.guides.edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.guides.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/guides/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@update',
        'as' => 'admin.guides.update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.guides.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/guides/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@destroy',
        'as' => 'admin.guides.destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.guides.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/guides_list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\GuideController@getAll',
        'as' => 'admin.guides.all',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.coupons.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons/index',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@index',
        'as' => 'admin.coupons.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.coupons.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@create',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@create',
        'as' => 'admin.coupons.create',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.coupons.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/coupons/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@store',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@store',
        'as' => 'admin.coupons.store',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.coupons.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@edit',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@edit',
        'as' => 'admin.coupons.edit',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.coupons.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/coupons/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@update',
        'as' => 'admin.coupons.update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.coupons.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/coupons/destroy/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@destroy',
        'as' => 'admin.coupons.destroy',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.coupons.all' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/coupons_list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:admin',
          2 => 'check_if_user',
          3 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@getAll',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\CouponController@getAll',
        'as' => 'admin.coupons.all',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@index',
        'as' => 'user.dashboard',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/divisions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@getDivisions',
        'controller' => 'App\\Http\\Controllers\\LocationController@getDivisions',
        'as' => 'user.',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.generated::s5GdxUTSOzAe1cff' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/districts/{division_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@getDistricts',
        'controller' => 'App\\Http\\Controllers\\LocationController@getDistricts',
        'as' => 'user.generated::s5GdxUTSOzAe1cff',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.generated::nyBebsKOcyxVGtHF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/upazilas/{district_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\LocationController@getUpazilas',
        'controller' => 'App\\Http\\Controllers\\LocationController@getUpazilas',
        'as' => 'user.generated::nyBebsKOcyxVGtHF',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/edit_biodata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@index',
        'as' => 'user.edit_biodata.index',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.biodata' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/biodata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@biodata',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@biodata',
        'as' => 'user.edit_biodata.biodata',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.general' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/general',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@general',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@general',
        'as' => 'user.edit_biodata.general',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.address' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/address',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@address',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@address',
        'as' => 'user.edit_biodata.address',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.education' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/education',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@education',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@education',
        'as' => 'user.edit_biodata.education',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.family' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/family',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@family',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@family',
        'as' => 'user.edit_biodata.family',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.personal' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/personal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@personal',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@personal',
        'as' => 'user.edit_biodata.personal',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.professional' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/professional',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@professional',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@professional',
        'as' => 'user.edit_biodata.professional',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.marrage' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/marrage',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@marrage',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@marrage',
        'as' => 'user.edit_biodata.marrage',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.expected' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/expected',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@expected',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@expected',
        'as' => 'user.edit_biodata.expected',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.commitment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/commitment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@commitment',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@commitment',
        'as' => 'user.edit_biodata.commitment',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.edit_biodata.contact' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/edit_biodata/contact',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
          4 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@contact',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BiodataController@contact',
        'as' => 'user.edit_biodata.contact',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => 'user/edit_biodata',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.my_biodata' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/my_biodata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@my_biodata',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@my_biodata',
        'as' => 'user.my_biodata',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.favourite' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/favourite',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@favourite',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@favourite',
        'as' => 'user.favourite',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.my_purchases' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/my_purchases',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@my_purchases',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@my_purchases',
        'as' => 'user.my_purchases',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.settings' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@settings',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@settings',
        'as' => 'user.settings',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.change_password' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/change_password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@change_password',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@change_password',
        'as' => 'user.change_password',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.delete_biodata_page' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/delete_biodata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@delete_biodata_page',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@delete_biodata_page',
        'as' => 'user.delete_biodata_page',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.delete_biodata' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/delete_biodata',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@delete_biodata',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@delete_biodata',
        'as' => 'user.delete_biodata',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.buy_connection' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/buy_connection',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@buy_connection',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@buy_connection',
        'as' => 'user.buy_connection',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.connection' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/connection/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@connection',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@connection',
        'as' => 'user.connection',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.use_connection' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/use_connection/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@use_connection',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@use_connection',
        'as' => 'user.use_connection',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.connection_buy_bkash' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/connection_buy_bkash/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@connection_buy_bkash',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@connection_buy_bkash',
        'as' => 'user.connection_buy_bkash',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.bkash_callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/connection_bkash/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@bkash_callback',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@bkash_callback',
        'as' => 'user.bkash_callback',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.connection_buy_nagad' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/connection_buy_nagad/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@connection_buy_nagad',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@connection_buy_nagad',
        'as' => 'user.connection_buy_nagad',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.bkash.callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user/bkash/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BkashPaymentController@callback',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BkashPaymentController@callback',
        'as' => 'user.bkash.callback',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.bkash.execute' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/bkash/execute-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\BkashPaymentController@executePayment',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\BkashPaymentController@executePayment',
        'as' => 'user.bkash.execute',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.favourite.update' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/favourite/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\FavouriteController@update',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\FavouriteController@update',
        'as' => 'user.favourite.update',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.favourite.delete' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/favourite/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\FavouriteController@destroy',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\FavouriteController@destroy',
        'as' => 'user.favourite.delete',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.biodata_report' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/biodata_report/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@biodata_report',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@biodata_report',
        'as' => 'user.biodata_report',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.apply_coupon' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user/apply_coupon',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth:user',
          2 => 'hard_maintainance',
          3 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@apply_coupon',
        'controller' => 'App\\Http\\Controllers\\Backend\\User\\UserDashboardController@apply_coupon',
        'as' => 'user.apply_coupon',
        'namespace' => 'App\\Http\\Controllers\\Backend\\Admin',
        'prefix' => '/user',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.auth.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user_login/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/user_login',
        'where' => 
        array (
        ),
        'as' => 'user.auth.login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.auth.loginUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user_login/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@loginUser',
        'controller' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@loginUser',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/user_login',
        'where' => 
        array (
        ),
        'as' => 'user.auth.loginUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.auth.otpGet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user_login/otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@otp',
        'controller' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@otp',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/user_login',
        'where' => 
        array (
        ),
        'as' => 'user.auth.otpGet',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.auth.otp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user_login/otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@otp',
        'controller' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@otp',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/user_login',
        'where' => 
        array (
        ),
        'as' => 'user.auth.otp',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.auth.registration' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user_login/registration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@registration',
        'controller' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@registration',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/user_login',
        'where' => 
        array (
        ),
        'as' => 'user.auth.registration',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.auth.registerUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user_login/registration',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@registerUser',
        'controller' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@registerUser',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/user_login',
        'where' => 
        array (
        ),
        'as' => 'user.auth.registerUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.auth.existingUserLogin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user_login/existingUserLogin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@existingUserLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@existingUserLogin',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/user_login',
        'where' => 
        array (
        ),
        'as' => 'user.auth.existingUserLogin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'user.auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user_login/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\User\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '/user_login',
        'where' => 
        array (
        ),
        'as' => 'user.auth.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'UserRegister' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@UserRegister',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@UserRegister',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'UserRegister',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'hard_unavailable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'unavailable',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:388:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:169:"function () {
    if (!\\env(\'HARD_MAINTENANCE_MODE\', false)) {
        return \\redirect()->route(\'frontend.home\');
    }
    return \\view(\'frontend.unavailable\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a4e0000000000000000";}";s:4:"hash";s:44:"Ac5Qd33+qGnxJEC/ZpZ7AXK+4VmthLluaS8V08ORZ3E=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'hard_unavailable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'database_reform' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'database_reform',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Backend\\Admin\\DatabaseReform@index',
        'controller' => 'App\\Http\\Controllers\\Backend\\Admin\\DatabaseReform@index',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'database_reform',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MYBukfim82bmqc3S' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:382:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:163:"function () {
        $send_mail = \'test@gmail.com\';
        \\dispatch(new \\App\\Jobs\\SendEmailJob($send_mail));
        \\dd(\'send mail successfully !!\');
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a5a0000000000000000";}";s:4:"hash";s:44:"rU3kFrcrEI0PbkeCk++IoAQoAUiWmrTo26Z10Zzrxns=";}}',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::MYBukfim82bmqc3S',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@index',
        'as' => 'frontend.home',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.biodata_details' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'biodata_details/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\HomeController@biodata_details',
        'controller' => 'App\\Http\\Controllers\\Frontend\\HomeController@biodata_details',
        'as' => 'frontend.biodata_details',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.searchSubmit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'searchSubmit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\Search\\SearchController@searchSubmit',
        'controller' => 'App\\Http\\Controllers\\Frontend\\Search\\SearchController@searchSubmit',
        'as' => 'frontend.searchSubmit',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.search' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\Search\\SearchController@search',
        'controller' => 'App\\Http\\Controllers\\Frontend\\Search\\SearchController@search',
        'as' => 'frontend.search',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.mission' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'mission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@mission',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@mission',
        'as' => 'frontend.mission',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.vision' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'vision',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@vision',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@vision',
        'as' => 'frontend.vision',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.tos' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'terms_of_service',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@tos',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@tos',
        'as' => 'frontend.tos',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.admin_info' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin_info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@admin_info',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@admin_info',
        'as' => 'frontend.admin_info',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.googleLogin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/google',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ThirdPartLoginController@redirectToGoogle',
        'controller' => 'App\\Http\\Controllers\\Auth\\ThirdPartLoginController@redirectToGoogle',
        'as' => 'frontend.googleLogin',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.googleLoginCB' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'customer/auth/google/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ThirdPartLoginController@handleGoogleCallback',
        'controller' => 'App\\Http\\Controllers\\Auth\\ThirdPartLoginController@handleGoogleCallback',
        'as' => 'frontend.googleLoginCB',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.facebookLogin' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/facebook',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ThirdPartLoginController@redirectToFacebook',
        'controller' => 'App\\Http\\Controllers\\Auth\\ThirdPartLoginController@redirectToFacebook',
        'as' => 'frontend.facebookLogin',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'auth/facebook/callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ThirdPartLoginController@handleFacebookCallback',
        'controller' => 'App\\Http\\Controllers\\Auth\\ThirdPartLoginController@handleFacebookCallback',
        'as' => 'frontend.',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.privacy_policy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'privacy_policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@privacy_policy',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@privacy_policy',
        'as' => 'frontend.privacy_policy',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.refund_policy' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'refund_policy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@refund_policy',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@refund_policy',
        'as' => 'frontend.refund_policy',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.achievement' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'achievement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@achievement',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@achievement',
        'as' => 'frontend.achievement',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.faq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'faq',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@faq',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@faq',
        'as' => 'frontend.faq',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.contact_us' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'contact_us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@contact_us',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@contact_us',
        'as' => 'frontend.contact_us',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.contact_submission' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'contact_submission',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@contact_submission',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@contact_submission',
        'as' => 'frontend.contact_submission',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.about_us' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'about_us',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@about_us',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@about_us',
        'as' => 'frontend.about_us',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.guide' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guide',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'App\\Http\\Controllers\\Frontend\\PageController@guide',
        'controller' => 'App\\Http\\Controllers\\Frontend\\PageController@guide',
        'as' => 'frontend.guide',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'frontend.lang' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lang/{prefix}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'lang',
          2 => 'hard_maintainance',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:428:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:209:"function ($prefix) {
        if (\\in_array($prefix, [\'en\', \'bn\'])) {
            \\session()->put(\'locale\', $prefix);
            return \\back();
        } else {
            \\abort(404);
        }
    }";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"0000000000000a710000000000000000";}";s:4:"hash";s:44:"uEv/infRtWzt6Rdo/afNGGyWJHgmIAhaB+wecBvi2tc=";}}',
        'as' => 'frontend.lang',
        'namespace' => 'App\\Http\\Controllers\\Frontend',
        'prefix' => '/lang',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
