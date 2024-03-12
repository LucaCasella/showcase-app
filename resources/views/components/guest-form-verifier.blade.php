<div>
    <h2>Registrazione Utente</h2>

    <form action="{{ route('guest-form') }}" method="post">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label for="phone">Numero di Telefono:</label>
            <input type="tel" name="phone" required>
        </div>

        <div>
            <button type="submit">Scopri i prezzi</button>
        </div>
    </form>
</div>
