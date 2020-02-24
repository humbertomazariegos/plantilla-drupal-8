@servers(['web' => 'deployer@18.211.123.120'])

@setup
$repository = 'git@gitlab.com:pixtig/plantillas/drupal-8.git';
$app_dir = '/data/dev/template';
$folder = 'drupal8';
$branch = 'master';
$release = date('YmdHis');
$commit_despliegue = getenv('CI_COMMIT_SHA');
@endsetup

@story('deploy')
clone_repository
{{--create_env--}}
@endstory

@task('clone_repository', ['on' => 'web'])
echo 'Updating repository - Pixtig'
[ -d {{ $app_dir }}/{{ $folder }} ] && cd {{ $app_dir }}/{{ $folder }} ; git pull origin {{ $branch }} ; git checkout {{ $commit_despliegue }}  || git clone --depth 1 {{ $repository }} {{ $folder }}
@endtask

@task('create_env', ['on' => 'web'])
echo "Creating config files for release date: {{ $release }}"
cd {{ $app_dir }}/{{ $folder }}
{{--rm sites/default/settings.php--}}
{{--cp sites/default/custom.settings.php sites/default/settings.php--}}
@endtask