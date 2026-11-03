
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | GAWAL MIDTERM EXAM</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 240px;
            background: #0f172a;
            color: white;
            padding: 28px 18px;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
            margin-bottom: 38px;
        }

        .brand span {
            color: #38bdf8;
        }

        .nav-label {
            color: #94a3b8;
            font-size: 12px;
            margin: 20px 10px 12px;
            text-transform: uppercase;
        }

        .nav-link {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 13px 14px;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .nav-link.active,
        .nav-link:hover {
            background: #1e293b;
            color: white;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 32px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 32px;
        }

        .topbar h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
        }

        .profile {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 16px;
            font-weight: bold;
        }

        .welcome {
            background: linear-gradient(120deg, #0f172a, #1d4ed8);
            color: white;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 28px;
        }

        .welcome h2 {
            font-size: 25px;
            margin-bottom: 12px;
        }

        .welcome p {
            color: #dbeafe;
            line-height: 1.6;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 18px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 14px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.04);
        }

        .card-icon {
            font-size: 27px;
            margin-bottom: 18px;
        }

        .card h3 {
            color: #64748b;
            font-size: 14px;
            font-weight: normal;
            margin-bottom: 12px;
        }

        .number {
            font-size: 32px;
            font-weight: bold;
        }

        .activity {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 24px;
        }

        .activity-row {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .activity-row:last-child {
            border-bottom: none;
        }

        .activity-icon {
            background: #eff6ff;
            padding: 12px;
            border-radius: 10px;
        }

        @media (max-width: 850px) {
            .sidebar {
                width: 190px;
            }

            .main {
                padding: 22px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
            }

            .brand {
                margin-bottom: 20px;
            }

            .main {
                padding: 18px;
            }

            .topbar h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="layout">

        <aside class="sidebar">
            <div class="brand">GAWAL<span>.</span></div>

            <div class="nav-label">Main Menu</div>

            <a href="{{ route('dashboard') }}" class="nav-link active">
                🏠 Dashboard
            </a>

            <a href="{{ url('/disposal-manifests') }}" class="nav-link">
                📦 Disposal Manifests
            </a>

            <div class="nav-label">System</div>

            <a href="{{ url('/') }}" class="nav-link">
                🌐 Home
            </a>
        </aside>

        <main class="main">

            <header class="topbar">
                <div>
                    <h1>Dashboard</h1>
                    <p class="muted">Overview of your management system.</p>
                </div>

                <div class="profile">Administrator</div>
            </header>

            <section class="welcome">
                <h2>Welcome to your Dashboard! 👋</h2>
                <p>
                    Manage your records, monitor your activities,
                    and access your system features in one place.
                </p>
            </section>

            <h2 class="section-title">System Overview</h2>

            <section class="cards">
                <div class="card">
                    <div class="card-icon">📦</div>
                    <h3>Total Items</h3>
                    <div class="number">0</div>
                    <p class="muted">Items recorded in the system</p>
                </div>

                <div class="card">
                    <div class="card-icon">📋</div>
                    <h3>Total Bookings</h3>
                    <div class="number">0</div>
                    <p class="muted">Bookings recorded in the system</p>
                </div>

                <div class="card">
                    <div class="card-icon">♻️</div>
                    <h3>Disposal Manifests</h3>
                    <div class="number">0</div>
                    <p class="muted">Disposal records in the system</p>
                </div>
            </section>

            <section class="activity">
                <h2 class="section-title">Quick Information</h2>

                <div class="activity-row">
                    <div class="activity-icon">✅</div>
                    <div>
                        <strong>Dashboard Created</strong>
                        <p class="muted">Your dashboard page is ready.</p>
                    </div>
                </div>

                <div class="activity-row">
                    <div class="activity-icon">🛠️</div>
                    <div>
                        <strong>System Management</strong>
                        <p class="muted">
                            Use the navigation menu to access your pages.
                        </p>
                    </div>
                </div>
            </section>

        </main>
    </div>
</body>
</html>
