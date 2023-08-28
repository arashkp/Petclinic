# Pet Clinic Application Using TALL Stack, PostgreSQL, and OpenShift

A demonstration of a Pet Clinic application built with the TALL (Tailwind CSS, Alpine.js, Laravel, and Livewire) Stack, integrated with PostgreSQL, and deployed on OpenShift.

## Table of Contents

- [Setting up the TALL Stack](#setting-up-the-tall-stack)
- [Database Configuration: PostgreSQL](#database-configuration-postgresql)
- [Developing the Pet Clinic Application](#developing-the-pet-clinic-application)
- [Dockerizing the Application](#dockerizing-the-application)
- [Deploying to OpenShift](#deploying-to-openshift)
- [Conclusion and Further Improvements](#conclusion-and-further-improvements)

## Setting up the TALL Stack

- Initialize a new Laravel project.
- Install and integrate [Tailwind CSS](https://tailwindcss.com/).
- Add [Alpine.js](https://github.com/alpinejs/alpine) for frontend interactions.
- Integrate Laravel with [Livewire](https://laravel-livewire.com/) for dynamic components.

## Database Configuration: PostgreSQL

- Set up a PostgreSQL database locally for development.
- Update Laravel's `.env` configuration to connect with PostgreSQL:



## Developing the Pet Clinic Application

- Define the following primary models and their relationships:
- `Owner`
- `Pet`
- `Veterinarian`
- `Appointment`
- Implement CRUD operations for each model.
- Set up email-based authentication.
- Store hashed passwords securely using Laravel's `bcrypt` method.

## Dockerizing the Application

- Containerize the Laravel application using a `Dockerfile`.
- Define a multi-container setup using `docker-compose.yml`.
- The Dockerized application and setup are available in the [Petclinic Repository](https://github.com/arashkp/Petclinic).

## Deploying to OpenShift

- Create a new OpenShift project.
- Add PostgreSQL service from the OpenShift catalog for the database.
- Deploy the Laravel application using the source-to-image (S2I) method, pointing to the provided GitHub repository.
- **Important**: Configure necessary environment variables such as `DB_CONNECTION`, `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD`, `APP_KEY`, etc., in the OpenShift console under the **Environment** tab.

Access the application by navigating to the provided OpenShift route after successful deployment.

## Conclusion and Further Improvements

This demonstration showcases the robustness of the TALL stack combined with the scalability of OpenShift. Potential future improvements include adding more features like appointment reminders, integrating a payment gateway for services, and enhancing the UI/UX further.
