@extends('layouts.base')

@section('title', 'Contact Us')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Contact Us</h2>
        <p>If you have any questions, feel free to reach out to us.</p>

        <div class="row">
            <div class="col-md-6">
                <h4>Email</h4>
                <p>support@shopy.com</p>

                <h4>Phone</h4>
                <p>+123 456 7890</p>

                <h4>Address</h4>
                <p>123 Market Street, City, Country</p>
            </div>

            <div class="col-md-6">
                <h4>Send Us a Message</h4>
                <form method="POST" action="">   <!-- 'contact.submit' -->
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
