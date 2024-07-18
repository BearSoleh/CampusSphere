@extends('layouts.admin')

<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="title pb-20">
            <h2 class="h3 mb-0">Dashboard</h2>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="card-box d-flex flex-column justify-content-center align-items-center p-4 text-center text-secondary">
                        <div class="img pb-3">
                            <img src="vendors/images/seller.png" alt="" />
                        </div>
                        <div class="content">
                            <h3 class="h4">Seller</h3>
                            <p class="max-width-400 mx-auto">
                                <br>
                                Can create product, manage product and manage order.<br>
                                <br>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="card-box d-flex flex-column justify-content-center align-items-center p-4 text-center text-secondary">
                        <div class="img pb-3">
                            <img src="vendors/images/admin.png" alt="" />
                        </div>
                        <div class="content">
                            <h3 class="h4">Admin</h3>
                            <p class="max-width-400 mx-auto">
                                Can create, update and delete product.<br>
                                Can manage category and user.<br>
                                Only one person responsible to be the admin.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="card-box d-flex flex-column justify-content-center align-items-center p-4 text-center text-secondary">
                        <div class="img pb-3">
                            <img src="vendors/images/user.png" alt="" />
                        </div>
                        <div class="content">
                            <h3 class="h4">User / Buyer</h3>
                            <p class="max-width-400 mx-auto">
                                Can view and buy product.<br>
                                Can view order and upload receipt of payment.
                                <br>
                                <br>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
