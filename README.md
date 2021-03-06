# Laravel Base API
Scalable and reusable Laravel based API application

### Apllication is based on [Microservices](https://microservices.io/) architecture


- [How to install](https://github.com/Maksim1990/Laravel_Base_API_project/blob/master/public/docs/installation.md)
- [How to run BEHAT REST API tests](https://github.com/Maksim1990/Laravel_Base_API_project/blob/master/public/docs/behat.md)
- [How to run locally PHPStan code analysis](https://github.com/Maksim1990/Laravel_Base_API_project/blob/master/public/docs/phpstan.md)
- [About Mail server](https://github.com/Maksim1990/Laravel_Base_API_project/blob/master/public/docs/mailserver.md)
- [About Swagger documentation](https://github.com/Maksim1990/Laravel_Base_API_project/blob/master/public/docs/swagger.md)
- [How to use SonarQube code analyzing](https://github.com/Maksim1990/Laravel_Base_API_project/blob/master/services/docker/sonarqube/sonarqube.md)

---
### Following technologies and frameworks are used in this project and related microservices

- **Languages**: PHP 7.3, Python 3.7, Golang
- **Databases**: MySQL, MongoDB, Redis
- **Frameworks**: [Laravel](https://laravel.com/)>=5.8, [Flask](http://flask.palletsprojects.com/en/1.1.x/), [Gin](https://gin-gonic.com/)
- **CI/CD**: [CircleCI](https://circleci.com/)
- **Tests**: PhpUnit, Behat, PHPStan, SonarQube
- **Serverless**: AWS, IBM
- **Other**: Docker, Git, Swagger, Nginx, Supervisor, Composer, PIP
- **Logging**: [Fluentd](https://www.fluentd.org/), [Kibana](https://www.elastic.co/products/kibana)
- **Queues/AMQP**: [RabbitMQ](https://www.rabbitmq.com/)
- **Full-text searching**: [ElasticSearch](https://www.elastic.co/)
- **Email/SMS**: Mailgun, AWS SNS/SQS
- **Bug/error tracking**: [Sentry](https://sentry.io)
---

### Swagger documentation:
- [REST API DOCS](http://thewayyougo.com:8001/api/doc)

### Application structure:
![Mockup for feature A](https://github.com/Maksim1990/Laravel_Base_API_project/blob/master/public/docs/app_structure.png)


### Microservices:
- [PYTHON AWS SMS MICROSERVICE](https://github.com/Maksim1990/python_microservice_ampq_aws-sms/tree/master)
    - Triggered by RabbitMQ messages (binding key 'service.sms.*')
    - Python 3.7, AWS SDK, RabbitMQ
- [GOLANG LOGGING MICROSERVICE](https://github.com/Maksim1990/Golang_Logging_Microservice)
    - Triggered by RabbitMQ messages (binding key 'service.logging.*')
    - Golang, RabbitMQ
 - [PYTHON FLASK NOTES MICROSERVICE](https://github.com/Maksim1990/Python_RESTFul_API_Service_App)
    - Triggered by REST HTTP requests
    - Python 3.7, Flask framework
    - MySQL, MongoDB
