pipeline {
    agent { docker { image 'php' } }
    stages {
        stage('build') {
            steps {
		sh 'php -r "copy(\"https://getcomposer.org/installer\", \"composer-setup.php\");"'
		sh 'php composer-setup.php'
		sh 'php -r "unlink(\"composer-setup.php\");"'
                sh 'composer.phar install'
		sh 'cp .env.sqlite .env'
		sh 'php artisan key:generate'
		sh 'touch database/database.sqlite'
		sh 'php artisan migrate --seed'
            }
        }
    }
}
