<!-- resources/views/email-form.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/submit-email">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Submit</button>
</form>
