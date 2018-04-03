pipeline {
    agent { docker { image 'php' } }
    stages {
        stage('build') {
            steps {
                sh 'composer install'
		sh 'cp .env.sqlite .env'
		sh 'php artisan key:generate'
		sh 'touch database/database.sqlite'
		sh 'php artisan migrate --seed'
            }
        }
    }
}
