# Client Requirements Document

## Project Title:

ServiceSphere - Service Marketplace API

## Client Overview:

The client aims to build a service marketplace platform connecting freelancers and clients. The API will be the backbone for managing user interactions, services, transactions, and notifications.

## Objective:

Develop a RESTful API to enable seamless interaction between service providers (freelancers) and clients, facilitating service discovery, booking, payment processing, and feedback mechanisms.

## Functional Requirements

### 1. User Management

#### User Roles:

-   Clients: Users seeking services. They should be able to search for services, book them, and leave feedback.
-   Service Providers: Users offering services. They should be able to list their offerings, manage their availability, and respond to bookings.

#### Features:

-   User Registration and Login:

    -   Clients and providers can register via email and password.
    -   Secure login with JWT-based authentication.
    -   Password reset functionality.

-   Profile Management:

    -   Clients: Name, contact details, profile picture, and saved preferences.
    -   Service Providers: Name, contact details, profile picture, service categories, availability status, and detailed service description.
    -   Editable profiles with validations for mandatory fields.

-   Role Management:
    -   Distinct dashboards for clients and providers.
    -   Clients cannot post services, and providers cannot book services unless explicitly assigned dual roles.

### 2. Service Listings

#### CRUD Operations:

-   Service providers can create, update, delete, and view their service listings.

#### Search & Filter:

-   Clients can search services by keywords.
-   Filters: Location, category, price range, and availability.

### 3. Booking System

#### Features:

-   Clients can book a service.
-   Service providers can accept or reject bookings.
-   Booking status management (Pending, Accepted, Rejected, Completed).

### 4. Reviews & Ratings

-   Clients can leave reviews and ratings for services.
-   Service providers can respond to reviews.

### 5. Transaction Management

-   Integration with payment gateways (e.g., Stripe, PayPal) for secure payment handling.
-   Transaction history for clients and providers.
-   Automatic invoice generation upon successful transactions.

### 6. Notifications

-   Real-time notifications for booking updates (e.g., accepted, rejected).
-   Optional email notifications for key events.

### 7. Admin Panel

#### Features:

-   Manage users (activate, deactivate, delete).
-   View and moderate services and reviews.
-   Analytics dashboard for insights (e.g., service demand, revenue trends).

## Non-Functional Requirements

### 1. Scalability

-   The API should handle increasing users and transactions without performance degradation.

### 2. Security

-   Implement secure authentication (JWT).
-   Ensure encrypted communication (HTTPS).
-   Validate all inputs to prevent SQL injection and other attacks.

### 3. Performance

-   API response time should not exceed 500ms under normal conditions.
-   Optimize database queries for speed.

### 4. Documentation

-   Provide comprehensive API documentation using Swagger or Postman.

### 5. Availability

-   Uptime of 99.9% for production.
-   Implement health-check endpoints for monitoring.

## Deliverables

-   Fully functional RESTful API hosted on a cloud server.
-   API documentation for developers.
-   Admin dashboard with analytics and moderation tools.
-   User and transaction database schema.

## User Stories

1. User Management

    - As a client, I want to register using my email and password so that I can create an account on the platform.
    - As a service provider, I want to register using my email and password so that I can offer my services.
    - As a client, I want to log in securely using my credentials so that I can access the platform's features.
    - As a service provider, I want to log in securely using my credentials so that I can manage my services.
    - As a client, I want to update my profile information so that my details are accurate and up to date.
    - As a service provider, I want to update my profile information, including service categories and availability, so that potential clients can view my services.
    - As a user, I want to reset my password if I forget it so that I can regain access to my account.
    - As a client, I want to view a dashboard tailored to my role so that I can easily navigate relevant features.
    - As a service provider, I want to view a dashboard tailored to my role so that I can manage my offerings effectively.

## Database Schemas

### User Management Tables

-   Users Table:

    -   id: Primary key, unique identifier for each user.
    -   name: String, required, the full name of the user.
    -   email: String, unique, required, used for login and communication.
    -   password: String, required, hashed password for secure authentication.
    -   profile_picture: String, optional, URL to the user's profile picture.
    -   role: Enum (Client, Service Provider), required, specifies the user's role.
    -   created_at: Timestamp, auto-generated, records when the user was created.
    -   updated_at: Timestamp, auto-generated, records the last update to the user.

-   Password Resets Table:

    -   id: Primary key, unique identifier for each password reset request.
    -   email: String, required, email address associated with the request.
    -   token: String, required, unique token for password reset validation.
    -   created_at: Timestamp, auto-generated, records when the reset request was created.

-   Profiles Table:

    -   id: Primary key, unique identifier for each profile.
    -   user_id: Foreign key, references Users(id), links the profile to a user.
    -   contact_details: String, optional, additional contact information for the user.
    -   saved_preferences: JSON, optional, stores preferences for clients.
    -   service_categories: JSON, optional, lists categories of services offered by providers.
    -   availability_status: Boolean, optional, indicates if a provider is available.
    -   description: Text, optional, detailed description of the service provider.
    -   created_at: Timestamp, auto-generated, records when the profile was created.
    -   updated_at: Timestamp, auto-generated, records the last update to the profile.
