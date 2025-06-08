<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penugasan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #4A90E2; /* Biru cerah */
            --primary-hover: #3A7DCB;
            --secondary-color: #6c757d;
            --text-color: #343a40;
            --header-bg: #f8f9fa;
            --border-color: #dee2e6;
            --card-bg: #ffffff;
            --shadow-light: rgba(0, 0, 0, 0.08);

            /* Status Colors */
            --status-success: #28a745; /* Hijau */
            --status-danger: #dc3545; /* Merah */
            --status-info: #17a2b8; /* Biru Cyan */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            color: var(--text-color);
        }

        .container {
            width: 95%;
            max-width: 1200px;
            background-color: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 8px 25px var(--shadow-light);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        h2 {
            font-size: 1.8rem;
            color: var(--primary-color);
            padding: 25px 30px 15px;
            margin: 0;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .table-responsive {
            overflow-x: auto;
            padding: 20px 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px; /* Ensure table doesn't get too small */
        }

        thead th {
            background-color: var(--header-bg);
            color: var(--text-color);
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 0.95rem;
            border-bottom: 2px solid var(--border-color);
        }

        tbody td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
            vertical-align: middle;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Styling for Status badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #fff;
            white-space: nowrap;
            text-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }

        .status-badge.selesai {
            background-color: var(--status-success);
        }

        .status-badge.ditolak {
            background-color: var(--status-danger);
        }

        .status-badge.ditugaskan {
            background-color: var(--status-info);
        }

        .status-badge i {
            margin-right: 5px;
        }

        /* Action button */
        .action-button {
            background-color: #e9f5ff; /* Light blue background for action */
            color: var(--primary-color);
            border: 1px solid #d0e8ff;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px; /* Fixed width for consistent look */
            height: 38px; /* Fixed height */
            box-sizing: border-box; /* Include padding/border in width/height */
        }

        .action-button:hover {
            background-color: var(--primary-color);
            color: #fff;
            border-color: var(--primary-hover);
            box-shadow: 0 4px 10px rgba(74, 144, 226, 0.3);
        }

        .action-button i {
            font-size: 1.1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            .container {
                border-radius: 8px;
            }
            h2 {
                font-size: 1.5rem;
                padding: 20px 20px 10px;
            }
            .table-responsive {
                padding: 15px 20px;
            }
            thead th, tbody td {
                padding: 10px;
                font-size: 0.85rem;
            }
            .status-badge {
                padding: 4px 8px;
                font-size: 0.75rem;
            }
            .action-button {
                padding: 6px 10px;
                width: 32px;
                height: 32px;
            }
            .action-button i {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Penugasan</h2>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penugasan</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Delegator</th>
                        <th>Delegasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Cek Keuangan Juli 2024</td>
                        <td>2025-05-02</td>
                        <td>2025-05-03</td>
                        <td>Miskiyah</td>
                        <td>Nurlin Salam</td>
                        <td><span class="status-badge selesai"><i class="fa-solid fa-circle-check"></i> Selesai</span></td>
                        <td>
                            <button class="action-button" title="Edit Penugasan"><i class="fa-solid fa-pencil"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>