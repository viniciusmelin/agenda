let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('node_modules/admin-lte/dist/css/AdminLTE.css','public/adminlte/css/AdminLTE.min.css');
mix.copy('node_modules/admin-lte/dist/css/skins/_all-skins.css','public/adminlte/css/skins/all-skins.min.css');
mix.copy('node_modules/admin-lte/dist/js/adminlte.js','public/adminlte/js/adminlte.min.js');
mix.copy('node_modules/admin-lte/plugins/iCheck/icheck.js','public/adminlte/plugins/icheck/icheck.min.js');
mix.copy('node_modules/admin-lte/plugins/iCheck/square/_all.css','public/adminlte/plugins/icheck/square/_all.min.css');
mix.copy('node_modules/admin-lte/plugins/iCheck/square/*.png','public/adminlte/plugins/icheck/square');
mix.copy('node_modules/datatables.net-bs/css/dataTables.bootstrap.css','public/adminlte/plugins/datatables/css/dataTables.bootstrap.min.css');
mix.copy('node_modules/datatables.net-bs/js/dataTables.bootstrap.js','public/adminlte/plugins/datatables/js/dataTables.bootstrap.min.js');
mix.copy('node_modules/datatables.net/js/jquery.dataTables.js','public/adminlte/plugins/datatables/js/jquery.dataTables.min.js');

mix.copy('node_modules/jquery/dist/jquery.js','public/js/jquery.min.js');
mix.copy('node_modules/ionicons/dist/css/ionicons.css','public/ionicons/css/ionicons.min.css');
mix.copy('node_modules/ionicons/dist/fonts','public/ionicons/fonts');
mix.copy('resources/assets/js/notify.min.js','public/js/notify.min.js');
mix.copy('resources/assets/js/patient/patient.js','public/js/patient.min.js');
mix.copy('resources/assets/js/patient/patient_pes.js','public/js/patient_pes.min.js');
mix.copy('resources/assets/js/doctor/doctor.js','public/js/doctor.min.js');
mix.copy('resources/assets/js/doctor/doctor_pes.js','public/js/doctor_pes.min.js');
mix.copy('resources/assets/js/scheduling/scheduling.js','public/js/scheduling.min.js');

mix.copy('resources/assets/js/security/security.js','public/js/security.min.js');