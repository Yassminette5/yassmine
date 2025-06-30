<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Notifications - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h3 class="mb-4"><i class="fas fa-bell text-primary me-2"></i> Toutes les notifications</h3>

        @if ($notifications->count() > 0)
            <div class="mb-3 text-end">
                <form method="POST" action="{{ route('notifications.markAllRead') }}">
                    @csrf
                    <button class="btn btn-sm btn-outline-success">
                        <i class="fas fa-check-double me-1"></i> Marquer tout comme lu
                    </button>
                </form>
            </div>
        @endif

        <ul class="list-group shadow-sm">
            @forelse ($notifications as $notification)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-envelope me-2 text-primary"></i>
                        {{ $notification->data['message'] ?? 'Notification' }}
                    </div>

                    @if (!$notification->read_at)
                        <a href="{{ route('notifications.read', $notification->id) }}" class="badge bg-warning text-dark text-decoration-none">
                            Marquer comme lue
                        </a>
                    @else
                        <span class="badge bg-success">Lue</span>
                    @endif
                </li>
            @empty
                <li class="list-group-item text-muted">Aucune notification trouvée.</li>
            @endforelse
        </ul>

        <div class="mt-4">
            {{ $notifications->links() }}
        </div>

        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Retour au dashboard
            </a>
        </div>
    </div>

</body>
</html>
