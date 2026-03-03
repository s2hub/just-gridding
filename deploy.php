<?php

namespace Deployer;

require 'recipe/composer.php';
require 'recipe/silverstripe.php';

$user = '';
$php_cli = 'php84';
$git_repository = '';
$hostname = '';
$hostIp = '';
$themeName = 'mytheme';

set('repository', $git_repository);
set('theme_name', $themeName);

host($hostname)
    ->set('hostname', $hostIp)
    ->set('port', 222)
    ->set('remote_user',$user)
    ->set('forward_agent', true)
    ->set('ssh_multiplexing',false)
    ->set('http_user', $user)
//    ->set('bin/composer', $php_cli . ' -d allow_url_fopen=On ~/.linuxbrew/bin/composer')
    ->set('stage','live')
    ->set('deploy_path', '/usr/www/users/' . $user); // Define the base path to deploy your project to.


// env('timezone', 'DE');
// env('branch', ''); // Branch to deploy.
set('default_stage', 'live');

set('bin/php', $php_cli);

set('repository', $git_repository);
set('keep_releases', 5);

// Silverstripe shared dirs
set('shared_dirs', [
    'public/assets',
    'themes/'. $themeName . '/node_modules'
]);

desc('create silverstripe-cache');
task('silverstripe:cachedir', function () {
    run('mkdir -p {{release_or_current_path}}/silverstripe-cache');
}
);

//desc('set PHP Version to 8.1 in test domain');
//task('silverstripe:php81', function() {
//    run('sed -i \'1s/^/FcgidWrapper "home\/httpd\/cgi-bin\/php81-fcgi-starter.fcgi" .php  \n\n/\' {{release_or_current_path}}/public/.htaccess');
//});

//add task cachedir to the task list
after('deploy:update_code', 'silverstripe:cachedir');
//after('silverstripe:buildflush', 'silverstripe:php81');

desc('build frontend');
task('silverstripe:buildfrontend', function() {
    run('cd {{release_or_current_path}}/themes/{theme_name} && yarn -i && yarn build');
});
after('silverstripe:buildflush',  'silverstripe:buildfrontend');


// If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

after('deploy', 'deploy:success');

//SS6
// Silverstripe cli script
set('silverstripe_cli_script', function () {
    $paths = [
        'framework/cli-script.php',
        'vendor/silverstripe/framework/cli-script.php',
        'vendor/bin/sake'
    ];
    foreach ($paths as $path) {
        if (test('[ -f {{release_or_current_path}}/' . $path . ' ]')) {
            return $path;
        }
    }
});

/**
 * Helper tasks
 */
desc('Runs /dev/build');
task('silverstripe:build', function () {
//    run('{{bin/php}} {{release_or_current_path}}/{{silverstripe_cli_script}} /dev/build');
    run('{{release_or_current_path}}/{{silverstripe_cli_script}} /dev/build');
});

//set('silverstripe_version', InstalledVersions::getVersion('silverstripe/framework'));


desc('Runs /dev/build?flush=all on Silverstripe {{silverstripe_version}}');
task('silverstripe:buildflush', function () {

//    run('{{bin/php}} {{release_or_current_path}}/{{silverstripe_cli_script}} /dev/build flush=all');
    run('{{release_or_current_path}}/{{silverstripe_cli_script}} db:build --flush');
});