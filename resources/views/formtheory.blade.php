@verbatim
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A complete beginner-friendly Laravel workflow for creating a contact form and saving submitted data in a MySQL database.">
    <title>Laravel Contact Form - Complete Flow</title>

    <style>
        :root {
            --bg: #090909;
            --surface: #111111;
            --surface-2: #181818;
            --surface-3: #202020;
            --text: #f5f5f5;
            --muted: #b7b7b7;
            --border: #303030;
            --accent: #ff2d20;
            --accent-soft: rgba(255, 45, 32, 0.12);
            --success: #39d98a;
            --warning: #ffcb45;
            --info: #6ea8fe;
            --code: #0d0d0d;
            --shadow: 0 18px 50px rgba(0, 0, 0, 0.35);
            --radius: 18px;
            --radius-sm: 10px;
            --max-width: 1240px;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background:
                radial-gradient(circle at top right, rgba(255, 45, 32, 0.10), transparent 28rem),
                var(--bg);
            color: var(--text);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            line-height: 1.75;
        }

        a {
            color: inherit;
        }

        code,
        pre {
            font-family: "SFMono-Regular", Consolas, "Liberation Mono", Menlo, monospace;
        }

        .topbar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(9, 9, 9, 0.88);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
        }

        .topbar-inner {
            width: min(calc(100% - 32px), var(--max-width));
            margin: auto;
            min-height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: -0.02em;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--accent);
            color: white;
            font-weight: 900;
            box-shadow: 0 8px 24px rgba(255, 45, 32, 0.28);
        }

        .top-link {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.93rem;
        }

        .top-link:hover {
            color: var(--text);
        }

        .hero {
            width: min(calc(100% - 32px), var(--max-width));
            margin: 38px auto 28px;
            padding: clamp(28px, 5vw, 62px);
            border: 1px solid var(--border);
            border-radius: 28px;
            background:
                linear-gradient(135deg, rgba(255, 45, 32, 0.16), transparent 45%),
                var(--surface);
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
        }

        .hero::after {
            content: "Laravel";
            position: absolute;
            right: -22px;
            bottom: -68px;
            font-size: clamp(5rem, 15vw, 12rem);
            font-weight: 900;
            letter-spacing: -0.08em;
            color: rgba(255, 255, 255, 0.025);
            pointer-events: none;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            border-radius: 999px;
            border: 1px solid rgba(255, 45, 32, 0.35);
            background: var(--accent-soft);
            color: #ff8179;
            font-size: 0.84rem;
            font-weight: 750;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        h1 {
            margin: 22px 0 14px;
            max-width: 850px;
            font-size: clamp(2.2rem, 6vw, 5.2rem);
            line-height: 1.02;
            letter-spacing: -0.055em;
        }

        .hero p {
            max-width: 850px;
            color: var(--muted);
            font-size: clamp(1rem, 1.4vw, 1.15rem);
            margin: 0;
        }

        .hero-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 26px;
        }

        .tag {
            padding: 8px 11px;
            background: rgba(255, 255, 255, 0.045);
            border: 1px solid var(--border);
            border-radius: 999px;
            color: #d4d4d4;
            font-size: 0.86rem;
        }

        .layout {
            width: min(calc(100% - 32px), var(--max-width));
            margin: 0 auto 80px;
            display: grid;
            grid-template-columns: 290px minmax(0, 1fr);
            gap: 28px;
            align-items: start;
        }

        .sidebar {
            position: sticky;
            top: 94px;
            max-height: calc(100vh - 118px);
            overflow: auto;
            padding: 18px;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            background: var(--surface);
        }

        .sidebar h2 {
            margin: 0 0 12px;
            font-size: 1rem;
        }

        .toc {
            display: grid;
            gap: 3px;
        }

        .toc a {
            padding: 8px 10px;
            border-radius: 8px;
            color: var(--muted);
            text-decoration: none;
            font-size: 0.88rem;
            line-height: 1.35;
        }

        .toc a:hover {
            color: var(--text);
            background: var(--surface-2);
        }

        .content {
            min-width: 0;
        }

        .section {
            scroll-margin-top: 92px;
            margin-bottom: 24px;
            padding: clamp(22px, 4vw, 38px);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            background: var(--surface);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.16);
        }

        .section-number {
            display: inline-flex;
            margin-bottom: 8px;
            color: #ff8179;
            font-size: 0.83rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        h2 {
            margin: 0 0 14px;
            font-size: clamp(1.45rem, 3vw, 2.2rem);
            line-height: 1.2;
            letter-spacing: -0.035em;
        }

        h3 {
            margin: 28px 0 10px;
            font-size: 1.15rem;
            line-height: 1.35;
        }

        p {
            margin: 10px 0;
            color: #dedede;
        }

        ul,
        ol {
            padding-left: 22px;
            color: #dedede;
        }

        li + li {
            margin-top: 7px;
        }

        .lead {
            color: var(--muted);
            font-size: 1.04rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-top: 18px;
        }

        .card {
            padding: 18px;
            border-radius: 14px;
            background: var(--surface-2);
            border: 1px solid var(--border);
        }

        .card h3 {
            margin-top: 0;
        }

        .style-name {
            color: var(--accent);
            font-weight: 850;
        }

        .inline-code {
            display: inline-block;
            padding: 1px 7px;
            border: 1px solid var(--border);
            border-radius: 6px;
            background: var(--surface-3);
            color: #ffd0cd;
            font-size: 0.92em;
        }

        .code-block {
            position: relative;
            margin: 16px 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: var(--code);
        }

        .code-label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            min-height: 42px;
            padding: 8px 12px;
            border-bottom: 1px solid var(--border);
            background: #151515;
            color: var(--muted);
            font-size: 0.78rem;
            font-weight: 750;
            text-transform: uppercase;
            letter-spacing: 0.07em;
        }

        .copy-btn {
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface-3);
            color: var(--text);
            padding: 5px 9px;
            cursor: pointer;
            font-size: 0.76rem;
        }

        .copy-btn:hover {
            border-color: #555;
        }

        pre {
            margin: 0;
            padding: 18px;
            overflow-x: auto;
            color: #ececec;
            font-size: 0.88rem;
            line-height: 1.65;
            tab-size: 4;
        }

        .good {
            color: var(--success);
        }

        .bad {
            color: #ff7878;
        }

        .note,
        .warning,
        .tip {
            margin: 18px 0;
            padding: 16px 18px;
            border-radius: 12px;
            border-left: 4px solid;
            background: var(--surface-2);
        }

        .note {
            border-color: var(--info);
        }

        .warning {
            border-color: var(--warning);
        }

        .tip {
            border-color: var(--success);
        }

        .note strong,
        .warning strong,
        .tip strong {
            color: var(--text);
        }

        .table-wrap {
            overflow-x: auto;
            margin: 18px 0;
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
            background: var(--surface-2);
        }

        th,
        td {
            padding: 13px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }

        th {
            color: white;
            background: #1d1d1d;
            font-size: 0.86rem;
        }

        td {
            color: #d7d7d7;
            font-size: 0.92rem;
        }

        tr:last-child td {
            border-bottom: 0;
        }

        .flow {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin: 18px 0;
        }

        .flow-item {
            padding: 10px 13px;
            border-radius: 10px;
            border: 1px solid var(--border);
            background: var(--surface-2);
            font-weight: 700;
            font-size: 0.9rem;
        }

        .arrow {
            color: var(--accent);
            font-weight: 900;
        }

        blockquote {
            margin: 20px 0;
            padding: 18px 20px;
            border-left: 4px solid var(--accent);
            background: var(--accent-soft);
            border-radius: 0 12px 12px 0;
            color: #f4d8d6;
            font-size: 1.05rem;
        }

        .summary {
            background:
                linear-gradient(135deg, rgba(255, 45, 32, 0.11), transparent 50%),
                var(--surface);
        }

        footer {
            width: min(calc(100% - 32px), var(--max-width));
            margin: 0 auto 40px;
            padding: 24px;
            color: var(--muted);
            text-align: center;
            border-top: 1px solid var(--border);
        }

        .mobile-toc {
            display: none;
            width: min(calc(100% - 32px), var(--max-width));
            margin: 0 auto 18px;
        }

        .mobile-toc details {
            border: 1px solid var(--border);
            border-radius: 14px;
            background: var(--surface);
            padding: 14px;
        }

        .mobile-toc summary {
            cursor: pointer;
            font-weight: 750;
        }

        .mobile-toc nav {
            display: grid;
            gap: 7px;
            margin-top: 12px;
        }

        .mobile-toc a {
            color: var(--muted);
            text-decoration: none;
        }

        @media (max-width: 900px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .mobile-toc {
                display: block;
            }

            .grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 560px) {
            .topbar-inner,
            .hero,
            .layout,
            .mobile-toc,
            footer {
                width: min(calc(100% - 20px), var(--max-width));
            }

            .hero {
                margin-top: 18px;
                padding: 24px 20px;
                border-radius: 20px;
            }

            .section {
                padding: 21px 17px;
            }

            .brand span:last-child {
                font-size: 0.92rem;
            }

            .top-link {
                display: none;
            }
        }
    
    </style>
</head>

<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a class="brand" href="#top">
                <span class="brand-mark">L</span>
                <span>Laravel Contact Form Flow</span>
            </a>
            <a class="top-link" href="#recommended-order">Jump to final flow ↓</a>
        </div>
    </header>

    <main id="top">
        <section class="hero">
            <span class="eyebrow">Beginner Laravel Guide</span>
            <h1>Complete Contact Form and Database Flow</h1>
            <p>
                Learn the correct order for creating a Laravel database form:
                database setup, migration, model, controller, routes, Blade view,
                validation, submission, and record storage.
            </p>

            <div class="hero-tags">
                <span class="tag">Migration</span>
                <span class="tag">Model</span>
                <span class="tag">Controller</span>
                <span class="tag">Routes</span>
                <span class="tag">Blade</span>
                <span class="tag">Validation</span>
                <span class="tag">MySQL</span>
            </div>
        </section>

        <div class="mobile-toc">
            <details>
                <summary>Open table of contents</summary>
                <nav>
                    <a href="#overview">1. Project overview</a>
<a href="#database-setup">2. Database setup</a>
<a href="#migration">3. Create migration</a>
<a href="#run-migration">4. Run migration</a>
<a href="#model">5. Create model</a>
<a href="#model-config">6. Configure model</a>
<a href="#controller">7. Create controller</a>
<a href="#routes">8. Create routes</a>
<a href="#view">9. Create Blade form</a>
<a href="#form-connection">10. Form and route connection</a>
<a href="#matching-fields">11. Matching field names</a>
<a href="#run-project">12. Run and test</a>
<a href="#submission-flow">13. Submission flow</a>
<a href="#responsibilities">14. Responsibilities</a>
<a href="#recommended-order">15. Recommended order</a>
                </nav>
            </details>
        </div>

        <div class="layout">
            <aside class="sidebar">
                <h2>Table of contents</h2>
                <nav class="toc">
                    <a href="#overview">1. Project overview</a>
<a href="#database-setup">2. Database setup</a>
<a href="#migration">3. Create migration</a>
<a href="#run-migration">4. Run migration</a>
<a href="#model">5. Create model</a>
<a href="#model-config">6. Configure model</a>
<a href="#controller">7. Create controller</a>
<a href="#routes">8. Create routes</a>
<a href="#view">9. Create Blade form</a>
<a href="#form-connection">10. Form and route connection</a>
<a href="#matching-fields">11. Matching field names</a>
<a href="#run-project">12. Run and test</a>
<a href="#submission-flow">13. Submission flow</a>
<a href="#responsibilities">14. Responsibilities</a>
<a href="#recommended-order">15. Recommended order</a>
                </nav>
            </aside>

            <article class="content">
                
<section class="section" id="overview">
    <span class="section-number">Section 01</span>
    <h2>What are we building?</h2>
    <p class="lead">
        We are building a Laravel contact form that accepts a student's name, email,
        and about message, validates the information, and saves it in the
        <span class="inline-code">students</span> database table.
    </p>

    <div class="flow">
        <span class="flow-item">Browser Form</span>
        <span class="arrow">→</span>
        <span class="flow-item">Route</span>
        <span class="arrow">→</span>
        <span class="flow-item">Controller</span>
        <span class="arrow">→</span>
        <span class="flow-item">Model</span>
        <span class="arrow">→</span>
        <span class="flow-item">Database</span>
    </div>

    <div class="tip">
        <strong>Beginner rule:</strong> First prepare the database structure, then create
        the model, controller, routes, and finally the Blade form.
    </div>

    <h3>Files used in this example</h3>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Purpose</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Database structure</td><td><code>database/migrations/...create_students_table.php</code></td></tr>
                <tr><td>Database model</td><td><code>app/Models/Student.php</code></td></tr>
                <tr><td>Request handling</td><td><code>app/Http/Controllers/StudentController.php</code></td></tr>
                <tr><td>URLs</td><td><code>routes/web.php</code></td></tr>
                <tr><td>HTML form</td><td><code>resources/views/contact.blade.php</code></td></tr>
                <tr><td>Database connection</td><td><code>.env</code></td></tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section" id="database-setup">
    <span class="section-number">Section 02</span>
    <h2>Step 1: Create and configure the database</h2>
    <p>
        First create a MySQL database in phpMyAdmin. For this example, the database
        name is <span class="inline-code">laravel_contact</span>.
    </p>

    
    <div class="code-block">
        <div class="code-label">Database name</div>
        <pre><code>laravel_contact</code></pre>
    </div>
    

    <p>Now open the Laravel project’s <code>.env</code> file and configure MySQL:</p>

    
    <div class="code-block">
        <div class="code-label">File: .env</div>
        <pre><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_contact
DB_USERNAME=root
DB_PASSWORD=</code></pre>
    </div>
    

    <div class="note">
        <strong>XAMPP note:</strong> The default MySQL username is commonly
        <code>root</code>, and the password is commonly empty. Use your actual
        MySQL credentials if you changed them.
    </div>

    <p>After changing the database configuration, clear Laravel's configuration cache:</p>

    
    <div class="code-block">
        <div class="code-label">Terminal</div>
        <pre><code>php artisan config:clear</code></pre>
    </div>
    

    <h3>What this step does</h3>
    <p>
        It tells Laravel which MySQL database should receive the records submitted
        from the contact form.
    </p>
</section>

<section class="section" id="migration">
    <span class="section-number">Section 03</span>
    <h2>Step 2: Create the migration</h2>
    <p>
        A migration defines the structure of a database table. We need a
        <code>students</code> table containing the fields used by the form.
    </p>

    
    <div class="code-block">
        <div class="code-label">Terminal</div>
        <pre><code>php artisan make:migration create_students_table</code></pre>
    </div>
    

    <p>Laravel creates a migration file inside:</p>

    
    <div class="code-block">
        <div class="code-label">Generated location</div>
        <pre><code>database/migrations/</code></pre>
    </div>
    

    <p>Open the generated migration and use this code:</p>

    
    <div class="code-block">
        <div class="code-label">Migration: create_students_table.php</div>
        <pre><code>&lt;?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(&#x27;students&#x27;, function (Blueprint $table) {
            $table-&gt;id();
            $table-&gt;string(&#x27;name&#x27;);
            $table-&gt;string(&#x27;email&#x27;)-&gt;unique();
            $table-&gt;string(&#x27;about&#x27;);
            $table-&gt;timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(&#x27;students&#x27;);
    }
};</code></pre>
    </div>
    

    <h3>Understanding the columns</h3>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Migration code</th>
                    <th>Created column</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><code>$table-&gt;id()</code></td><td><code>id</code></td><td>Primary key for each student</td></tr>
                <tr><td><code>$table-&gt;string('name')</code></td><td><code>name</code></td><td>Stores the submitted name</td></tr>
                <tr><td><code>$table-&gt;string('email')-&gt;unique()</code></td><td><code>email</code></td><td>Stores one unique email per record</td></tr>
                <tr><td><code>$table-&gt;string('about')</code></td><td><code>about</code></td><td>Stores the form message</td></tr>
                <tr><td><code>$table-&gt;timestamps()</code></td><td><code>created_at</code>, <code>updated_at</code></td><td>Automatically stores creation and update times</td></tr>
            </tbody>
        </table>
    </div>

    <div class="note">
        <strong><code>up()</code>:</strong> Creates the table when migrations run.<br>
        <strong><code>down()</code>:</strong> Removes the same table when the migration is rolled back.
    </div>
</section>

<section class="section" id="run-migration">
    <span class="section-number">Section 04</span>
    <h2>Step 3: Run the migration</h2>
    <p>Run the following command to create the <code>students</code> table:</p>

    
    <div class="code-block">
        <div class="code-label">Terminal</div>
        <pre><code>php artisan migrate</code></pre>
    </div>
    

    <p>
        After the command succeeds, open phpMyAdmin and confirm that the
        <code>students</code> table exists.
    </p>

    <div class="warning">
        <strong>Important:</strong> Editing an old migration file after it has already
        run does not automatically update the database. During practice, you can use
        <code>php artisan migrate:fresh</code>, but it deletes all existing tables and data.
    </div>

    
    <div class="code-block">
        <div class="code-label">Practice-only reset command</div>
        <pre><code>php artisan migrate:fresh</code></pre>
    </div>
    
</section>

<section class="section" id="model">
    <span class="section-number">Section 05</span>
    <h2>Step 4: Create the Student model</h2>
    <p>
        The model communicates with the database table. Create it using Artisan:
    </p>

    
    <div class="code-block">
        <div class="code-label">Terminal</div>
        <pre><code>php artisan make:model Student</code></pre>
    </div>
    

    <p>Laravel creates:</p>

    
    <div class="code-block">
        <div class="code-label">Generated file</div>
        <pre><code>app/Models/Student.php</code></pre>
    </div>
    

    <div class="flow">
        <span class="flow-item">Student model</span>
        <span class="arrow">→</span>
        <span class="flow-item">students table</span>
    </div>

    <p>
        Laravel automatically expects the table name <code>students</code> because the
        model is named <code>Student</code>.
    </p>
</section>

<section class="section" id="model-config">
    <span class="section-number">Section 06</span>
    <h2>Step 5: Configure the model</h2>
    <p>
        Add the form fields to <code>$fillable</code>. This permits Laravel to insert
        these values using <code>Student::create()</code>.
    </p>

    
    <div class="code-block">
        <div class="code-label">File: app/Models/Student.php</div>
        <pre><code>&lt;?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        &#x27;name&#x27;,
        &#x27;email&#x27;,
        &#x27;about&#x27;,
    ];
}</code></pre>
    </div>
    

    <h3>Why is <code>$fillable</code> needed?</h3>
    <p>
        Laravel protects models against unwanted mass assignment. The
        <code>$fillable</code> array lists the fields that are allowed to be inserted
        together.
    </p>

    
    <div class="code-block">
        <div class="code-label">Later used in the controller</div>
        <pre><code>Student::create([
    &#x27;name&#x27; =&gt; &#x27;Rahul&#x27;,
    &#x27;email&#x27; =&gt; &#x27;rahul@example.com&#x27;,
    &#x27;about&#x27; =&gt; &#x27;I am learning Laravel.&#x27;,
]);</code></pre>
    </div>
    

    <div class="warning">
        Without the correct <code>$fillable</code> fields, Laravel may show a mass-assignment error.
    </div>
</section>

<section class="section" id="controller">
    <span class="section-number">Section 07</span>
    <h2>Step 6: Create and prepare the controller</h2>
    <p>
        The controller displays the form, receives the submitted data, validates it,
        calls the model, and redirects the user.
    </p>

    
    <div class="code-block">
        <div class="code-label">Terminal</div>
        <pre><code>php artisan make:controller StudentController</code></pre>
    </div>
    

    <p>Laravel creates:</p>

    
    <div class="code-block">
        <div class="code-label">Generated file</div>
        <pre><code>app/Http/Controllers/StudentController.php</code></pre>
    </div>
    

    <p>Replace the controller contents with:</p>

    
    <div class="code-block">
        <div class="code-label">File: StudentController.php</div>
        <pre><code>&lt;?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view(&#x27;contact&#x27;);
    }

    public function store(Request $request)
    {
        $validatedData = $request-&gt;validate([
            &#x27;name&#x27; =&gt; &#x27;required|string|max:255&#x27;,
            &#x27;email&#x27; =&gt; &#x27;required|email|max:255|unique:students,email&#x27;,
            &#x27;about&#x27; =&gt; &#x27;required|string|max:255&#x27;,
        ]);

        Student::create($validatedData);

        return redirect()
            -&gt;route(&#x27;students.create&#x27;)
            -&gt;with(&#x27;success&#x27;, &#x27;Form submitted successfully.&#x27;);
    }
}</code></pre>
    </div>
    

    <h3>Controller method responsibilities</h3>
    <div class="grid">
        <div class="card">
            <h3><code>create()</code></h3>
            <p>Displays the Blade contact form.</p>
            
    <div class="code-block">
        <div class="code-label">Method</div>
        <pre><code>public function create()
{
    return view(&#x27;contact&#x27;);
}</code></pre>
    </div>
    
        </div>

        <div class="card">
            <h3><code>store()</code></h3>
            <p>Receives, validates, saves, and redirects.</p>
            
    <div class="code-block">
        <div class="code-label">Method purpose</div>
        <pre><code>Receive form data
Validate form data
Save through Student model
Redirect with success message</code></pre>
    </div>
    
        </div>
    </div>
</section>

<section class="section" id="routes">
    <span class="section-number">Section 08</span>
    <h2>Step 7: Create the routes</h2>
    <p>
        Routes connect URLs and HTTP methods to controller methods.
    </p>

    
    <div class="code-block">
        <div class="code-label">File: routes/web.php</div>
        <pre><code>&lt;?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get(&#x27;/&#x27;, function () {
    return view(&#x27;welcome&#x27;);
});

Route::get(&#x27;/contact&#x27;, [StudentController::class, &#x27;create&#x27;])
    -&gt;name(&#x27;students.create&#x27;);

Route::post(&#x27;/contact&#x27;, [StudentController::class, &#x27;store&#x27;])
    -&gt;name(&#x27;students.store&#x27;);</code></pre>
    </div>
    

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>HTTP method</th>
                    <th>URL</th>
                    <th>Controller method</th>
                    <th>Purpose</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><code>GET</code></td><td><code>/contact</code></td><td><code>create()</code></td><td>Displays the form</td></tr>
                <tr><td><code>POST</code></td><td><code>/contact</code></td><td><code>store()</code></td><td>Processes and saves the form</td></tr>
            </tbody>
        </table>
    </div>

    <div class="note">
        The URL can be the same because the HTTP methods are different.
        <code>GET /contact</code> displays the form, while <code>POST /contact</code>
        receives submitted data.
    </div>
</section>

<section class="section" id="view">
    <span class="section-number">Section 09</span>
    <h2>Step 8: Create the Blade contact form</h2>
    <p>Create this file:</p>

    
    <div class="code-block">
        <div class="code-label">View path</div>
        <pre><code>resources/views/contact.blade.php</code></pre>
    </div>
    

    <p>Add the following Blade and HTML code:</p>

    
    <div class="code-block">
        <div class="code-label">File: contact.blade.php</div>
        <pre><code>&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;UTF-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1.0&quot;&gt;
    &lt;title&gt;Contact Form&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;

    &lt;h1&gt;Contact Form&lt;/h1&gt;

    @if(session(&#x27;success&#x27;))
        &lt;p style=&quot;color: green;&quot;&gt;
            {{ session(&#x27;success&#x27;) }}
        &lt;/p&gt;
    @endif

    &lt;form action=&quot;{{ route(&#x27;students.store&#x27;) }}&quot; method=&quot;POST&quot;&gt;
        @csrf

        &lt;div&gt;
            &lt;label for=&quot;name&quot;&gt;Name&lt;/label&gt;

            &lt;input
                type=&quot;text&quot;
                id=&quot;name&quot;
                name=&quot;name&quot;
                value=&quot;{{ old(&#x27;name&#x27;) }}&quot;
            &gt;

            @error(&#x27;name&#x27;)
                &lt;p style=&quot;color: red;&quot;&gt;{{ $message }}&lt;/p&gt;
            @enderror
        &lt;/div&gt;

        &lt;br&gt;

        &lt;div&gt;
            &lt;label for=&quot;email&quot;&gt;Email&lt;/label&gt;

            &lt;input
                type=&quot;email&quot;
                id=&quot;email&quot;
                name=&quot;email&quot;
                value=&quot;{{ old(&#x27;email&#x27;) }}&quot;
            &gt;

            @error(&#x27;email&#x27;)
                &lt;p style=&quot;color: red;&quot;&gt;{{ $message }}&lt;/p&gt;
            @enderror
        &lt;/div&gt;

        &lt;br&gt;

        &lt;div&gt;
            &lt;label for=&quot;about&quot;&gt;About&lt;/label&gt;

            &lt;textarea id=&quot;about&quot; name=&quot;about&quot;&gt;{{ old(&#x27;about&#x27;) }}&lt;/textarea&gt;

            @error(&#x27;about&#x27;)
                &lt;p style=&quot;color: red;&quot;&gt;{{ $message }}&lt;/p&gt;
            @enderror
        &lt;/div&gt;

        &lt;br&gt;

        &lt;button type=&quot;submit&quot;&gt;Submit&lt;/button&gt;
    &lt;/form&gt;

&lt;/body&gt;
&lt;/html&gt;</code></pre>
    </div>
    

    <h3>Important Blade features</h3>
    <div class="grid">
        <div class="card">
            <h3><code>@csrf</code></h3>
            <p>Adds Laravel’s security token to the POST form.</p>
        </div>
        <div class="card">
            <h3><code>old()</code></h3>
            <p>Restores the user's previous input after a validation error.</p>
        </div>
        <div class="card">
            <h3><code>@error</code></h3>
            <p>Displays the validation error for a particular field.</p>
        </div>
        <div class="card">
            <h3><code>session('success')</code></h3>
            <p>Displays the success message after the record is saved.</p>
        </div>
    </div>
</section>

<section class="section" id="form-connection">
    <span class="section-number">Section 10</span>
    <h2>How the form connects to the route</h2>

    
    <div class="code-block">
        <div class="code-label">Form opening tag</div>
        <pre><code>&lt;form action=&quot;{{ route(&#x27;students.store&#x27;) }}&quot; method=&quot;POST&quot;&gt;</code></pre>
    </div>
    

    <p>
        The form action uses the route name <code>students.store</code>.
        That name belongs to this POST route:
    </p>

    
    <div class="code-block">
        <div class="code-label">POST route</div>
        <pre><code>Route::post(&#x27;/contact&#x27;, [StudentController::class, &#x27;store&#x27;])
    -&gt;name(&#x27;students.store&#x27;);</code></pre>
    </div>
    

    <div class="flow">
        <span class="flow-item">Submit button</span>
        <span class="arrow">→</span>
        <span class="flow-item">students.store</span>
        <span class="arrow">→</span>
        <span class="flow-item">StudentController@store</span>
    </div>

    <div class="warning">
        If <code>@csrf</code> is missing from a POST form, Laravel normally returns
        a <code>419 Page Expired</code> error.
    </div>
</section>

<section class="section" id="matching-fields">
    <span class="section-number">Section 11</span>
    <h2>Keep all field names consistent</h2>
    <p>
        The same field names must be used in the form, validation rules, model, and database.
    </p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Layer</th>
                    <th>Name field</th>
                    <th>Email field</th>
                    <th>About field</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Blade form</td><td><code>name="name"</code></td><td><code>name="email"</code></td><td><code>name="about"</code></td></tr>
                <tr><td>Validation</td><td><code>'name'</code></td><td><code>'email'</code></td><td><code>'about'</code></td></tr>
                <tr><td>Model fillable</td><td><code>'name'</code></td><td><code>'email'</code></td><td><code>'about'</code></td></tr>
                <tr><td>Database column</td><td><code>name</code></td><td><code>email</code></td><td><code>about</code></td></tr>
            </tbody>
        </table>
    </div>

    <blockquote>
        Form input name = validation key = model fillable field = database column.
    </blockquote>

    <div class="note">
        Because the email column is unique, the same email address cannot be stored twice.
    </div>
</section>

<section class="section" id="run-project">
    <span class="section-number">Section 12</span>
    <h2>Step 9: Run and test the project</h2>

    
    <div class="code-block">
        <div class="code-label">Start Laravel</div>
        <pre><code>php artisan serve</code></pre>
    </div>
    

    <p>Open this URL in the browser:</p>

    
    <div class="code-block">
        <div class="code-label">Browser URL</div>
        <pre><code>http://127.0.0.1:8000/contact</code></pre>
    </div>
    

    <p>Example data:</p>

    
    <div class="code-block">
        <div class="code-label">Test form values</div>
        <pre><code>Name: Rahul
Email: rahul@example.com
About: I am learning Laravel.</code></pre>
    </div>
    

    <p>
        After submitting, check the <code>students</code> table in phpMyAdmin.
        You should see a new record.
    </p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>about</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Rahul</td>
                    <td>rahul@example.com</td>
                    <td>I am learning Laravel.</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section" id="submission-flow">
    <span class="section-number">Section 13</span>
    <h2>What happens after clicking Submit?</h2>

    <div class="flow">
        <span class="flow-item">1. Browser sends POST request</span>
        <span class="arrow">→</span>
        <span class="flow-item">2. Route receives it</span>
        <span class="arrow">→</span>
        <span class="flow-item">3. Controller validates</span>
        <span class="arrow">→</span>
        <span class="flow-item">4. Model inserts</span>
        <span class="arrow">→</span>
        <span class="flow-item">5. Database saves</span>
    </div>

    <h3>1. Browser sends the request</h3>
    
    <div class="code-block">
        <div class="code-label">HTTP request</div>
        <pre><code>POST /contact</code></pre>
    </div>
    

    <h3>2. The POST route catches it</h3>
    
    <div class="code-block">
        <div class="code-label">Route</div>
        <pre><code>Route::post(&#x27;/contact&#x27;, [StudentController::class, &#x27;store&#x27;]);</code></pre>
    </div>
    

    <h3>3. The controller receives the form data</h3>
    
    <div class="code-block">
        <div class="code-label">Controller method</div>
        <pre><code>public function store(Request $request)</code></pre>
    </div>
    

    <h3>4. Laravel validates the submitted values</h3>
    
    <div class="code-block">
        <div class="code-label">Validation</div>
        <pre><code>$validatedData = $request-&gt;validate([
    &#x27;name&#x27; =&gt; &#x27;required|string|max:255&#x27;,
    &#x27;email&#x27; =&gt; &#x27;required|email|max:255|unique:students,email&#x27;,
    &#x27;about&#x27; =&gt; &#x27;required|string|max:255&#x27;,
]);</code></pre>
    </div>
    

    <h3>5. The model saves the validated data</h3>
    
    <div class="code-block">
        <div class="code-label">Insert record</div>
        <pre><code>Student::create($validatedData);</code></pre>
    </div>
    

    <h3>6. The controller redirects back</h3>
    
    <div class="code-block">
        <div class="code-label">Redirect</div>
        <pre><code>return redirect()
    -&gt;route(&#x27;students.create&#x27;)
    -&gt;with(&#x27;success&#x27;, &#x27;Form submitted successfully.&#x27;);</code></pre>
    </div>
    

    <h3>7. The Blade view displays the success message</h3>
    
    <div class="code-block">
        <div class="code-label">Blade</div>
        <pre><code>@if(session(&#x27;success&#x27;))
    {{ session(&#x27;success&#x27;) }}
@endif</code></pre>
    </div>
    
</section>

<section class="section" id="responsibilities">
    <span class="section-number">Section 14</span>
    <h2>Responsibility of every Laravel part</h2>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Part</th>
                    <th>Responsibility</th>
                    <th>Example in this project</th>
                </tr>
            </thead>
            <tbody>
                <tr><td>Database</td><td>Permanently stores records</td><td><code>laravel_contact</code></td></tr>
                <tr><td>Migration</td><td>Defines table structure</td><td><code>create_students_table</code></td></tr>
                <tr><td>Model</td><td>Communicates with the table</td><td><code>Student</code></td></tr>
                <tr><td>Controller</td><td>Contains request and application logic</td><td><code>StudentController</code></td></tr>
                <tr><td>Route</td><td>Connects URL to controller</td><td><code>/contact</code></td></tr>
                <tr><td>View</td><td>Displays HTML and Blade form</td><td><code>contact.blade.php</code></td></tr>
                <tr><td>Request</td><td>Carries submitted values</td><td><code>$request</code></td></tr>
                <tr><td>Validation</td><td>Checks the submitted values</td><td><code>$request-&gt;validate()</code></td></tr>
            </tbody>
        </table>
    </div>
</section>

<section class="section summary" id="recommended-order">
    <span class="section-number">Section 15</span>
    <h2>Recommended creation order</h2>

    <p class="lead">
        Follow this order whenever you build a simple Laravel form that saves data.
    </p>

    <ol>
        <li>Create the MySQL database.</li>
        <li>Configure the database in <code>.env</code>.</li>
        <li>Create the migration.</li>
        <li>Add the required table columns.</li>
        <li>Run <code>php artisan migrate</code>.</li>
        <li>Create the model.</li>
        <li>Add the permitted fields to <code>$fillable</code>.</li>
        <li>Create the controller.</li>
        <li>Add <code>create()</code> and <code>store()</code> methods.</li>
        <li>Create the GET and POST routes.</li>
        <li>Create the Blade form.</li>
        <li>Test validation and submission.</li>
        <li>Check the saved record in phpMyAdmin.</li>
    </ol>

    <div class="code-block">
        <div class="code-label">Easy flow to remember</div>
        <pre><code>Database
   ↓
Migration
   ↓
Model
   ↓
Controller
   ↓
Routes
   ↓
Blade View
   ↓
Test Submission</code></pre>
    </div>

    <h3>Create model, migration, and controller together</h3>
    <p>
        Laravel can generate all three files with one command:
    </p>

    
    <div class="code-block">
        <div class="code-label">Combined Artisan command</div>
        <pre><code>php artisan make:model Student -mc</code></pre>
    </div>
    

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Option</th>
                    <th>Meaning</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><code>-m</code></td><td>Create a migration</td></tr>
                <tr><td><code>-c</code></td><td>Create a controller</td></tr>
            </tbody>
        </table>
    </div>

    <div class="tip">
        <strong>Learning recommendation:</strong> Create them separately at first.
        This makes it easier to understand the job of each Laravel component.
    </div>

    <blockquote>
        The migration creates the table, the model communicates with the table,
        the controller handles the logic, the routes connect URLs, and the Blade
        view displays the form.
    </blockquote>
</section>

            </article>
        </div>
    </main>

    <footer>
        Laravel Contact Form Flow — Migration → Model → Controller → Routes → Blade → Database
    </footer>

    <script>
        document.querySelectorAll('.code-block').forEach(function (block) {
            const label = block.querySelector('.code-label');
            const code = block.querySelector('code');

            if (!label || !code) return;

            const button = document.createElement('button');
            button.className = 'copy-btn';
            button.type = 'button';
            button.textContent = 'Copy';

            button.addEventListener('click', async function () {
                try {
                    await navigator.clipboard.writeText(code.innerText);
                    button.textContent = 'Copied';
                    setTimeout(function () {
                        button.textContent = 'Copy';
                    }, 1400);
                } catch (error) {
                    button.textContent = 'Select manually';
                }
            });

            label.appendChild(button);
        });
    </script>
</body>
</html>
@endverbatim
