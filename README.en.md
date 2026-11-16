# DeliveBoo — backend

A learning project for ordering food for delivery, from choosing dishes to managing orders in the restaurant dashboard. Built in 2024 by a team of five in about a month, as the final project of Boolean’s Full Stack Web Developer programme.

**[Watch the video demo](https://massimoperuga.dev/en/demo/deliveboo)** · [Project in my portfolio](https://massimoperuga.dev/en/formazione/boolean#deliveboo) · [Italiano](README.md)

[![DeliveBoo homepage, from the recording of the complete application](docs/images/deliveboo-preview.jpg)](https://massimoperuga.dev/en/demo/deliveboo)

This repository contains the **Laravel backend**, the APIs used by the frontend and the restaurant dashboard views. The video shows the complete application, including the customer frontend developed separately. The portfolio hosts the recording; the backend is not deployed as a publicly usable service.

## The project

We organised the work independently, with instructors from other classes acting as clients to simulate stakeholder discussions. The goal was to connect an ordering interface to a backend with relational data, a restaurant dashboard and test payments.

The [original assignment and exercise documentation](CONSEGNA.md), in Italian, is preserved in full so that the initial requirements can be compared with the implementation.

## Backend features

- Restaurant owner registration and sign-in, with restaurant profiles and cuisine types.
- Creating, editing and deleting dishes, with images and availability.
- APIs for retrieving restaurants, menus and cuisine types, and recording orders.
- A restaurant dashboard for viewing received orders.
- Payment token and checkout endpoints using Braintree sandbox.

## My contribution

I handled task allocation, technical decisions and support for teammates, agreeing on choices with the group. On the backend, I implemented:

- **Orders:** storing delivery details and linking each order to its dishes and quantities through a many-to-many relationship.
- **Order views:** listing orders for the signed-in restaurant and displaying their dishes and quantities in a detail view.
- **Payments:** integrating Braintree in sandbox, from generating the client token to submitting the transaction and returning its result.

## Stack and organisation

| Area | Technologies |
| --- | --- |
| Backend | PHP, Laravel 10 |
| Data | MySQL, Eloquent, migrations and seeders |
| Restaurant dashboard | Blade, Bootstrap 5, Sass, Vite |
| Authentication | Laravel Breeze |
| Test payments | Braintree PHP SDK, sandbox |

### Technical choices

- **Eloquent relationships:** the `dish_order` pivot table connects dishes to orders and stores their quantities. Each order can contain several dishes without duplicating dish data.
- **APIs and Blade views:** the customer frontend communicates through JSON endpoints, while the restaurant dashboard uses views rendered by Laravel. Both interfaces share the same models and data.
- **Braintree sandbox:** token generation and transaction submission run on the backend; the client supplies a payment method nonce. The sandbox supports practising the integration without real charges.

Where to start in the code:

- [API controllers](app/Http/Controllers/Api): catalogue, order creation and checkout.
- [Dashboard controllers](app/Http/Controllers/Admin) and [Blade views](resources/views/admin): restaurant and dish management, and order views.
- [Models](app/Models) and [migrations](database/migrations): relationships and data structure.
- [API routes](routes/api.php) and [web routes](routes/web.php): application entry points.

## Running locally

The backend requires PHP 8.1–8.3, Composer 2, a Node.js version compatible with Vite 5, and MySQL. The [setup guide](docs/SETUP.en.md) covers installation, configuration, database, seeders and sandbox payments. After starting the servers, open `/register` or `/login`.
