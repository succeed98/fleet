### Fleet Management System

This application was developed as part of a project to monitor the incoming contruction material (gravel) shipments for the company, a gravel sales agency. The agency receives multiple shipments from 'Hauling', 'Drilling', and 'Blasting' companies and must keep track of how many shipments they receive from any companies with which they do business.

The aim of this project was to allow them to track all of their shipments, and generate accurate end-of-month records (quantity & cost of shipments) for each of their business partners.

Steps to run application:

##### Application Setup
1. Run `npm install`
2. Create `.env` file and from `.env.example` and fill out database connection details.
3. Run `php artisan migrate`
4. Run `php artisan db:seed`
5. Launch Application

---

#### Admin View 

Admin (Test Account):
Email: 		admin@test.io
Password: 	12345678

The admin creates new trucks, register new drivers and companies, and set the weight and cost parameters for the shipments.

---

#### Shipment Controller View

Shipment Controller (Test Account):
Email:		agent@test.io 
Password:	12345678

The controller records shipments by scanning the barcode of the truck which triggers a form with some additionnal information to be filled for that specific shipment.
