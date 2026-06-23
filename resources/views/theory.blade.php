<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A complete guide to Laravel naming standards for models, controllers, methods, views, routes, variables, migrations, and database tables.">
    <title>Laravel Naming Standards - Complete Guide</title>

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
            --radius: 1px;
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
                <span>Laravel Naming Standards</span>
            </a>
            <a class="top-link" href="#summary">Jump to summary ↓</a>
        </div>
    </header>

    <main id="top">
        <section class="hero">
            <span class="eyebrow">Complete Laravel Guide</span>
            <h1>Naming Standards in Laravel</h1>
            <p>
                A practical and well-explained guide to naming models, controllers, functions,
                views, variables, routes, migrations, database tables, columns, and other
                important parts of a Laravel application.
            </p>

            <div class="hero-tags">
                <span class="tag">PascalCase</span>
                <span class="tag">camelCase</span>
                <span class="tag">snake_case</span>
                <span class="tag">kebab-case</span>
                <span class="tag">Dot notation</span>
            </div>
        </section>

        <div class="mobile-toc">
            <details>
                <summary>Open table of contents</summary>
                <nav>
                    <a href="#introduction">Introduction</a>
                    <a href="#styles">Main naming styles</a>
                    <a href="#models">Model naming</a>
                    <a href="#controllers">Controller naming</a>
                    <a href="#methods">Function and method naming</a>
                    <a href="#resource-methods">Resource methods</a>
                    <a href="#views">View naming</a>
                    <a href="#variables">Variable naming</a>
                    <a href="#database">Database naming</a>
                    <a href="#migrations">Migration naming</a>
                    <a href="#routes">Route naming</a>
                    <a href="#example">Complete example</a>
                    <a href="#mistakes">Common mistakes</a>
                    <a href="#summary">Final summary</a>
                </nav>
            </details>
        </div>

        <div class="layout">
            <aside class="sidebar">
                <h2>Table of contents</h2>
                <nav class="toc">
                    <a href="#introduction">1. Introduction</a>
                    <a href="#styles">2. Main naming styles</a>
                    <a href="#models">3. Model naming</a>
                    <a href="#controllers">4. Controller naming</a>
                    <a href="#methods">5. Function and method naming</a>
                    <a href="#resource-methods">6. Resource controller methods</a>
                    <a href="#custom-methods">7. Custom methods</a>
                    <a href="#views">8. View naming</a>
                    <a href="#view-paths">9. View paths</a>
                    <a href="#variables">10. Variable naming</a>
                    <a href="#booleans">11. Boolean naming</a>
                    <a href="#database">12. Database naming</a>
                    <a href="#foreign-keys">13. Foreign keys</a>
                    <a href="#migrations">14. Migration naming</a>
                    <a href="#routes">15. Route naming</a>
                    <a href="#resource-routes">16. Resource routes</a>
                    <a href="#example">17. Complete example</a>
                    <a href="#question-example">18. Question page example</a>
                    <a href="#importance">19. Why standards matter</a>
                    <a href="#mistakes">20. Common mistakes</a>
                    <a href="#summary">21. Final summary</a>
                </nav>
            </aside>

            <article class="content">
                <section class="section" id="introduction">
                    <span class="section-number">Section 01</span>
                    <h2>What are naming standards?</h2>
                    <p class="lead">
                        Naming standards are agreed rules for naming classes, files, functions,
                        variables, routes, database tables, and other parts of an application.
                    </p>

                    <p>
                        Laravel may still run when unusual names are used, but inconsistent names
                        make the project difficult to read and maintain. A developer should be able
                        to understand the responsibility of a file or method just by reading its name.
                    </p>

                    <p>Good naming standards make a project:</p>

                    <ul>
                        <li>Easier to understand</li>
                        <li>Easier to maintain</li>
                        <li>More consistent</li>
                        <li>Better for teamwork</li>
                        <li>More compatible with Laravel's automatic conventions</li>
                    </ul>

                    <blockquote>
                        Follow Laravel's default convention unless the project has a clear reason
                        to use a different structure.
                    </blockquote>
                </section>

                <section class="section" id="styles">
                    <span class="section-number">Section 02</span>
                    <h2>Main naming styles used in Laravel</h2>

                    <div class="grid">
                        <div class="card">
                            <h3><span class="style-name">PascalCase</span></h3>
                            <p>The first letter of every word is capitalized.</p>
                            <div class="code-block">
                                <div class="code-label">Examples</div>
                                <pre><code>Product
ProductController
CustomerOrder
WarrantyClaim</code></pre>
                            </div>
                            <p>Used for classes such as models, controllers, services, and repositories.</p>
                        </div>

                        <div class="card">
                            <h3><span class="style-name">camelCase</span></h3>
                            <p>The first word starts with lowercase, and each following word starts with uppercase.</p>
                            <div class="code-block">
                                <div class="code-label">Examples</div>
                                <pre><code>getProducts
calculateTotal
customerName
markAsDelivered</code></pre>
                            </div>
                            <p>Used for methods, functions, variables, and object properties.</p>
                        </div>

                        <div class="card">
                            <h3><span class="style-name">snake_case</span></h3>
                            <p>Words are lowercase and separated using underscores.</p>
                            <div class="code-block">
                                <div class="code-label">Examples</div>
                                <pre><code>customer_name
customer_orders
total_amount
created_at</code></pre>
                            </div>
                            <p>Used mainly for database tables, columns, and migration names.</p>
                        </div>

                        <div class="card">
                            <h3><span class="style-name">kebab-case</span></h3>
                            <p>Words are lowercase and separated using hyphens.</p>
                            <div class="code-block">
                                <div class="code-label">Examples</div>
                                <pre><code>customer-orders
warranty-claims
inventory-vehicles</code></pre>
                            </div>
                            <p>Commonly used in URLs and multiword view folders.</p>
                        </div>
                    </div>

                    <h3>Dot notation</h3>
                    <p>
                        Laravel uses dots to represent a structured path or namespace-like grouping.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Examples</div>
                        <pre><code>products.index
admin.products.create
dealer.orders.show</code></pre>
                    </div>

                    <p>
                        Dot notation is commonly used for route names, view paths, configuration
                        keys, and translation keys.
                    </p>
                </section>

                <section class="section" id="models">
                    <span class="section-number">Section 03</span>
                    <h2>Model naming standards</h2>

                    <p>
                        A model represents application data and normally corresponds to a database
                        table. A model object usually represents one database record, so its name
                        should be singular.
                    </p>

                    <h3>Standard rule</h3>
                    <ul>
                        <li>Use a singular noun.</li>
                        <li>Use PascalCase.</li>
                        <li>Name it after the entity it represents.</li>
                    </ul>

                    <div class="code-block">
                        <div class="code-label">Correct model names</div>
                        <pre><code class="good">User
Product
Customer
Vehicle
CustomerOrder
WarrantyClaim</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Model example</div>
                        <pre><code>&lt;?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
}</code></pre>
                    </div>

                    <p>The file should be stored as:</p>

                    <div class="code-block">
                        <div class="code-label">File path</div>
                        <pre><code>app/Models/Product.php</code></pre>
                    </div>

                    <h3>How Laravel connects a model to a table</h3>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Model</th>
                                    <th>Expected table</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><code>Product</code></td><td><code>products</code></td></tr>
                                <tr><td><code>Customer</code></td><td><code>customers</code></td></tr>
                                <tr><td><code>CustomerOrder</code></td><td><code>customer_orders</code></td></tr>
                                <tr><td><code>WarrantyClaim</code></td><td><code>warranty_claims</code></td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="warning">
                        <strong>Avoid:</strong> <code>Products</code>, <code>product</code>,
                        <code>ProductModel</code>, or <code>tblProduct</code>.
                    </div>

                    <h3>Using a non-standard table name</h3>
                    <p>
                        When working with an old or external database, the table name may not follow
                        Laravel's convention. In that situation, define it manually.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Custom table name</div>
                        <pre><code>class Product extends Model
{
    protected $table = 'product_master';
}</code></pre>
                    </div>
                </section>

                <section class="section" id="controllers">
                    <span class="section-number">Section 04</span>
                    <h2>Controller naming standards</h2>

                    <p>
                        A controller receives an HTTP request, coordinates the required work, and
                        returns a response such as a Blade view, redirect, or JSON result.
                    </p>

                    <h3>Standard rule</h3>
                    <ul>
                        <li>Use PascalCase.</li>
                        <li>Use the singular entity name.</li>
                        <li>End the class name with <code>Controller</code>.</li>
                    </ul>

                    <div class="code-block">
                        <div class="code-label">Correct controller names</div>
                        <pre><code class="good">ProductController
CustomerController
VehicleController
CustomerOrderController
WarrantyClaimController</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Controller example</div>
                        <pre><code>&lt;?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
}</code></pre>
                    </div>

                    <p>The file should be stored as:</p>

                    <div class="code-block">
                        <div class="code-label">File path</div>
                        <pre><code>app/Http/Controllers/ProductController.php</code></pre>
                    </div>

                    <h3>Why do we add a suffix?</h3>
                    <p>
                        A suffix explains the responsibility of a class. Compare these related names:
                    </p>

                    <div class="flow">
                        <span class="flow-item">Product</span>
                        <span class="arrow">→</span>
                        <span class="flow-item">ProductController</span>
                        <span class="arrow">→</span>
                        <span class="flow-item">ProductService</span>
                        <span class="arrow">→</span>
                        <span class="flow-item">ProductRepository</span>
                    </div>

                    <ul>
                        <li><code>Product</code> represents data.</li>
                        <li><code>ProductController</code> handles HTTP requests.</li>
                        <li><code>ProductService</code> handles business logic.</li>
                        <li><code>ProductRepository</code> handles data-access logic.</li>
                    </ul>
                </section>

                <section class="section" id="methods">
                    <span class="section-number">Section 05</span>
                    <h2>Function and method naming standards</h2>

                    <p>
                        A function performs an action. Its name should explain that action clearly.
                        Laravel and modern PHP projects normally use camelCase for method names.
                    </p>

                    <h3>Standard rule</h3>
                    <ul>
                        <li>Use camelCase.</li>
                        <li>Start with a verb when the method performs an action.</li>
                        <li>Use a meaningful and specific name.</li>
                        <li>Declare visibility such as <code>public</code>, <code>protected</code>, or <code>private</code>.</li>
                    </ul>

                    <div class="code-block">
                        <div class="code-label">Good method names</div>
                        <pre><code class="good">getProducts()
calculateTotal()
sendWelcomeEmail()
createCustomer()
markOrderAsDelivered()
checkWarrantyStatus()</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Poor method names</div>
                        <pre><code class="bad">data()
doIt()
functionOne()
View_Product_Page()
x()</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Example</div>
                        <pre><code>public function calculateOrderTotal(): float
{
    // Calculate and return the order total.
}</code></pre>
                    </div>

                    <div class="tip">
                        <strong>Tip:</strong> A good function name should make the code understandable
                        before you read the function body.
                    </div>
                </section>

                <section class="section" id="resource-methods">
                    <span class="section-number">Section 06</span>
                    <h2>Standard resource controller methods</h2>

                    <p>
                        Laravel provides seven standard method names for CRUD operations.
                        CRUD means Create, Read, Update, and Delete.
                    </p>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Method</th>
                                    <th>Purpose</th>
                                    <th>Typical view or action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td><code>index()</code></td><td>Display all records</td><td><code>products.index</code></td></tr>
                                <tr><td><code>create()</code></td><td>Display the creation form</td><td><code>products.create</code></td></tr>
                                <tr><td><code>store()</code></td><td>Save a new record</td><td>Insert and redirect</td></tr>
                                <tr><td><code>show()</code></td><td>Display one record</td><td><code>products.show</code></td></tr>
                                <tr><td><code>edit()</code></td><td>Display the edit form</td><td><code>products.edit</code></td></tr>
                                <tr><td><code>update()</code></td><td>Update an existing record</td><td>Update and redirect</td></tr>
                                <tr><td><code>destroy()</code></td><td>Delete a record</td><td>Delete and redirect</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Resource controller example</div>
                        <pre><code>class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->validated());

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}</code></pre>
                    </div>

                    <div class="note">
                        <strong>Important:</strong> The <code>create()</code> method displays the form,
                        while <code>store()</code> saves the submitted form data. Similarly,
                        <code>edit()</code> displays the edit form, while <code>update()</code> saves the changes.
                    </div>
                </section>

                <section class="section" id="custom-methods">
                    <span class="section-number">Section 07</span>
                    <h2>Custom controller method names</h2>

                    <p>
                        Not every action is a basic CRUD operation. An order may need to be approved,
                        cancelled, shipped, or delivered. These actions can use custom camelCase method names.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Custom action methods</div>
                        <pre><code>public function approve(Order $order)
{
}

public function cancel(Order $order)
{
}

public function markAsShipped(Order $order)
{
}

public function markAsDelivered(Order $order)
{
}</code></pre>
                    </div>

                    <p>
                        Inside <code>OrderController</code>, the method name <code>approve()</code>
                        is already clear because the controller provides the context. You do not
                        always need to repeat the word <code>Order</code>.
                    </p>
                </section>

                <section class="section" id="views">
                    <span class="section-number">Section 08</span>
                    <h2>View naming standards</h2>

                    <p>
                        A view contains the HTML shown to the user. Laravel Blade views are normally
                        stored inside <code>resources/views</code> and end with <code>.blade.php</code>.
                    </p>

                    <h3>Recommended structure</h3>

                    <div class="code-block">
                        <div class="code-label">Product views</div>
                        <pre><code>resources/views/
└── products/
    ├── index.blade.php
    ├── create.blade.php
    ├── show.blade.php
    └── edit.blade.php</code></pre>
                    </div>

                    <ul>
                        <li>Use a plural folder for the resource.</li>
                        <li>Use lowercase file names.</li>
                        <li>Use standard action names such as <code>index</code>, <code>create</code>, <code>show</code>, and <code>edit</code>.</li>
                        <li>Use the <code>.blade.php</code> extension.</li>
                    </ul>

                    <div class="warning">
                        <strong>Avoid inconsistent names:</strong>
                        <code>ProductList.blade.php</code>, <code>add_product.blade.php</code>,
                        and <code>EditProduct.blade.php</code>.
                    </div>

                    <h3>Multiword view folders</h3>
                    <p>
                        For multiword folders, use one consistent style across the project.
                        Kebab-case is clear and readable.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Recommended examples</div>
                        <pre><code>customer-orders/index.blade.php
warranty-claims/create.blade.php
inventory-vehicles/show.blade.php</code></pre>
                    </div>
                </section>

                <section class="section" id="view-paths">
                    <span class="section-number">Section 09</span>
                    <h2>Returning views with dot notation</h2>

                    <p>
                        Laravel uses dots in view names to represent folders.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Controller code</div>
                        <pre><code>return view('products.index');</code></pre>
                    </div>

                    <p>This points to:</p>

                    <div class="code-block">
                        <div class="code-label">Actual file</div>
                        <pre><code>resources/views/products/index.blade.php</code></pre>
                    </div>

                    <p>A deeper example:</p>

                    <div class="code-block">
                        <div class="code-label">Nested view</div>
                        <pre><code>return view('admin.products.create');</code></pre>
                    </div>

                    <p>This points to:</p>

                    <div class="code-block">
                        <div class="code-label">Actual file</div>
                        <pre><code>resources/views/admin/products/create.blade.php</code></pre>
                    </div>
                </section>

                <section class="section" id="variables">
                    <span class="section-number">Section 10</span>
                    <h2>Variable naming standards</h2>

                    <p>
                        Variables should use camelCase and should clearly describe the data they contain.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Good variable names</div>
                        <pre><code>$productName = 'Laptop';
$productPrice = 50000;
$totalAmount = 75000;
$customerOrder = null;</code></pre>
                    </div>

                    <h3>Singular and plural variables</h3>

                    <div class="code-block">
                        <div class="code-label">One record</div>
                        <pre><code>$product = Product::find(1);</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Multiple records</div>
                        <pre><code>$products = Product::all();</code></pre>
                    </div>

                    <p>
                        The singular or plural variable name tells the developer whether the value
                        contains one record or a collection of records.
                    </p>

                    <div class="warning">
                        <strong>Avoid unclear names:</strong> <code>$x</code>, <code>$data</code>,
                        <code>$value</code>, or <code>$temp</code>, unless the meaning is obvious
                        in a very small local context.
                    </div>
                </section>

                <section class="section" id="booleans">
                    <span class="section-number">Section 11</span>
                    <h2>Boolean variable naming</h2>

                    <p>
                        A Boolean variable stores <code>true</code> or <code>false</code>.
                        Its name should sound like a yes-or-no question.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Boolean examples</div>
                        <pre><code>$isActive = true;
$hasPermission = false;
$canEdit = true;
$shouldSendEmail = false;
$isApproved = true;
$hasWarranty = false;</code></pre>
                    </div>

                    <p>Common Boolean prefixes include:</p>

                    <div class="flow">
                        <span class="flow-item">is</span>
                        <span class="flow-item">has</span>
                        <span class="flow-item">can</span>
                        <span class="flow-item">should</span>
                        <span class="flow-item">was</span>
                        <span class="flow-item">needs</span>
                    </div>
                </section>

                <section class="section" id="database">
                    <span class="section-number">Section 12</span>
                    <h2>Database table and column naming</h2>

                    <h3>Table names</h3>
                    <p>
                        Database tables normally use plural snake_case names because a table stores
                        multiple records.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Table examples</div>
                        <pre><code>users
products
customers
customer_orders
warranty_claims
inventory_vehicles</code></pre>
                    </div>

                    <h3>Column names</h3>
                    <p>Database columns should normally use lowercase snake_case.</p>

                    <div class="code-block">
                        <div class="code-label">Column examples</div>
                        <pre><code>first_name
last_name
product_name
total_amount
sale_date
created_at
updated_at</code></pre>
                    </div>

                    <div class="flow">
                        <span class="flow-item">Product model</span>
                        <span class="arrow">→</span>
                        <span class="flow-item">products table</span>
                        <span class="arrow">→</span>
                        <span class="flow-item">product_name column</span>
                    </div>
                </section>

                <section class="section" id="foreign-keys">
                    <span class="section-number">Section 13</span>
                    <h2>Foreign key naming</h2>

                    <p>
                        A foreign key normally uses the singular model name followed by
                        <code>_id</code>.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Foreign key examples</div>
                        <pre><code>user_id
product_id
customer_id
order_id
warranty_policy_id</code></pre>
                    </div>

                    <p>
                        For example, if every product belongs to a category, the
                        <code>products</code> table would usually contain <code>category_id</code>.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Eloquent relationship</div>
                        <pre><code>public function category()
{
    return $this->belongsTo(Category::class);
}</code></pre>
                    </div>

                    <p>
                        Following the convention allows Laravel to automatically expect the
                        <code>category_id</code> foreign key.
                    </p>
                </section>

                <section class="section" id="migrations">
                    <span class="section-number">Section 14</span>
                    <h2>Migration naming standards</h2>

                    <p>
                        Migration names should use snake_case and clearly describe the database change.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Migration names</div>
                        <pre><code>create_products_table
create_customer_orders_table
add_price_to_products_table
remove_status_from_orders_table</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Artisan commands</div>
                        <pre><code>php artisan make:migration create_products_table

php artisan make:migration add_price_to_products_table</code></pre>
                    </div>

                    <p>Laravel adds a timestamp to the generated filename:</p>

                    <div class="code-block">
                        <div class="code-label">Generated file</div>
                        <pre><code>2026_06_23_100000_create_products_table.php</code></pre>
                    </div>
                </section>

                <section class="section" id="routes">
                    <span class="section-number">Section 15</span>
                    <h2>Route URL and route name standards</h2>

                    <h3>Route URLs</h3>
                    <p>
                        Resource URLs should normally be lowercase, plural, and kebab-case when they
                        contain multiple words.
                    </p>

                    <div class="code-block">
                        <div class="code-label">URL examples</div>
                        <pre><code>/products
/customers
/customer-orders
/warranty-claims
/inventory-vehicles</code></pre>
                    </div>

                    <div class="warning">
                        <strong>Avoid action-heavy URLs:</strong>
                        <code>/getAllProducts</code>, <code>/CreateProduct</code>, and
                        <code>/customer_orders</code>.
                    </div>

                    <h3>Route names</h3>
                    <p>Route names normally use lowercase dot notation.</p>

                    <div class="code-block">
                        <div class="code-label">Route name examples</div>
                        <pre><code>products.index
products.create
products.store
products.show
products.edit
products.update
products.destroy</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Named route</div>
                        <pre><code>Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Generating the URL</div>
                        <pre><code>route('products.index');</code></pre>
                    </div>
                </section>

                <section class="section" id="resource-routes">
                    <span class="section-number">Section 16</span>
                    <h2>How resource routes connect naming conventions</h2>

                    <p>
                        A resource route connects standard URLs, route names, and controller methods.
                    </p>

                    <div class="code-block">
                        <div class="code-label">Resource route</div>
                        <pre><code>Route::resource('products', ProductController::class);</code></pre>
                    </div>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>HTTP request</th>
                                    <th>URL</th>
                                    <th>Controller method</th>
                                    <th>Route name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>GET</td><td><code>/products</code></td><td><code>index()</code></td><td><code>products.index</code></td></tr>
                                <tr><td>GET</td><td><code>/products/create</code></td><td><code>create()</code></td><td><code>products.create</code></td></tr>
                                <tr><td>POST</td><td><code>/products</code></td><td><code>store()</code></td><td><code>products.store</code></td></tr>
                                <tr><td>GET</td><td><code>/products/{product}</code></td><td><code>show()</code></td><td><code>products.show</code></td></tr>
                                <tr><td>GET</td><td><code>/products/{product}/edit</code></td><td><code>edit()</code></td><td><code>products.edit</code></td></tr>
                                <tr><td>PUT/PATCH</td><td><code>/products/{product}</code></td><td><code>update()</code></td><td><code>products.update</code></td></tr>
                                <tr><td>DELETE</td><td><code>/products/{product}</code></td><td><code>destroy()</code></td><td><code>products.destroy</code></td></tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section class="section" id="example">
                    <span class="section-number">Section 17</span>
                    <h2>Complete Product Management example</h2>

                    <p>
                        The following example shows how all naming standards connect in one Laravel module.
                    </p>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Component</th>
                                    <th>Recommended name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Model</td><td><code>Product</code></td></tr>
                                <tr><td>Model file</td><td><code>app/Models/Product.php</code></td></tr>
                                <tr><td>Controller</td><td><code>ProductController</code></td></tr>
                                <tr><td>Controller file</td><td><code>app/Http/Controllers/ProductController.php</code></td></tr>
                                <tr><td>Database table</td><td><code>products</code></td></tr>
                                <tr><td>View folder</td><td><code>resources/views/products</code></td></tr>
                                <tr><td>Route URL</td><td><code>/products</code></td></tr>
                                <tr><td>Route name</td><td><code>products.index</code></td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Route</div>
                        <pre><code>use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Model</div>
                        <pre><code>namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'is_active',
    ];
}</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Controller method</div>
                        <pre><code>public function index()
{
    $products = Product::latest()->get();

    return view('products.index', compact('products'));
}</code></pre>
                    </div>
                </section>

                <section class="section" id="question-example">
                    <span class="section-number">Section 18</span>
                    <h2>Improving a Laravel question page</h2>

                    <p>A less organized setup might use:</p>

                    <div class="code-block">
                        <div class="code-label">Less descriptive structure</div>
                        <pre><code>Controller: SarvjeetController
Method: viewQuestionPage()
View: LaravelQuestions.blade.php</code></pre>
                    </div>

                    <p>
                        The controller name does not explain what feature it manages. A cleaner
                        resource-based structure is:
                    </p>

                    <div class="code-block">
                        <div class="code-label">Recommended structure</div>
                        <pre><code>Controller: QuestionController
Method: index()
View: questions/index.blade.php
Route name: questions.index</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">QuestionController.php</div>
                        <pre><code>&lt;?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class QuestionController extends Controller
{
    public function index(): View
    {
        return view('questions.index');
    }
}</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">web.php</div>
                        <pre><code>use App\Http\Controllers\QuestionController;

Route::get('/questions', [QuestionController::class, 'index'])
    ->name('questions.index');</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">View file</div>
                        <pre><code>resources/views/questions/index.blade.php</code></pre>
                    </div>
                </section>

                <section class="section" id="importance">
                    <span class="section-number">Section 19</span>
                    <h2>Why naming standards are important</h2>

                    <h3>1. They improve readability</h3>
                    <div class="code-block">
                        <div class="code-label">Unclear</div>
                        <pre><code>$x = P::all();</code></pre>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Clear</div>
                        <pre><code>$products = Product::all();</code></pre>
                    </div>

                    <h3>2. They reduce confusion</h3>
                    <p>
                        A class named <code>ProductController</code> immediately tells the developer
                        that it handles product-related HTTP requests.
                    </p>

                    <h3>3. They improve teamwork</h3>
                    <p>
                        When everyone follows the same structure, another developer can predict
                        where controllers, views, routes, and database logic are located.
                    </p>

                    <h3>4. They help Laravel work automatically</h3>
                    <p>
                        Laravel uses conventions to determine table names, foreign keys, route-model
                        binding parameters, and relationship keys.
                    </p>

                    <h3>5. They make maintenance easier</h3>
                    <p>
                        Large projects may contain hundreds of files. Consistent naming makes it
                        easier to locate and safely update functionality.
                    </p>
                </section>

                <section class="section" id="mistakes">
                    <span class="section-number">Section 20</span>
                    <h2>Common naming mistakes</h2>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Incorrect</th>
                                    <th>Correct</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>Products</code> model</td>
                                    <td><code>Product</code></td>
                                    <td>A model normally represents one record.</td>
                                </tr>
                                <tr>
                                    <td><code>productcontroller</code></td>
                                    <td><code>ProductController</code></td>
                                    <td>Class names use PascalCase.</td>
                                </tr>
                                <tr>
                                    <td><code>CreateProduct()</code></td>
                                    <td><code>createProduct()</code> or <code>store()</code></td>
                                    <td>Methods use camelCase and standard resource names.</td>
                                </tr>
                                <tr>
                                    <td><code>ProductList.blade.php</code></td>
                                    <td><code>products/index.blade.php</code></td>
                                    <td>Views should follow a predictable resource structure.</td>
                                </tr>
                                <tr>
                                    <td><code>customerName</code> column</td>
                                    <td><code>customer_name</code></td>
                                    <td>Database columns use snake_case.</td>
                                </tr>
                                <tr>
                                    <td><code>/getAllProducts</code></td>
                                    <td><code>/products</code></td>
                                    <td>URLs should describe resources, not method names.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tip">
                        <strong>Best practice:</strong> Be consistent across the entire project.
                        A slightly different convention used consistently is better than mixing
                        several naming styles randomly.
                    </div>
                </section>

                <section class="section summary" id="summary">
                    <span class="section-number">Section 21</span>
                    <h2>Final naming summary</h2>

                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Component</th>
                                    <th>Standard</th>
                                    <th>Example</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Model</td><td>Singular PascalCase</td><td><code>CustomerOrder</code></td></tr>
                                <tr><td>Controller</td><td>Singular PascalCase + Controller</td><td><code>CustomerOrderController</code></td></tr>
                                <tr><td>Method</td><td>camelCase or resource method</td><td><code>markAsDelivered()</code></td></tr>
                                <tr><td>Variable</td><td>camelCase</td><td><code>$customerOrder</code></td></tr>
                                <tr><td>Collection variable</td><td>Plural camelCase</td><td><code>$customerOrders</code></td></tr>
                                <tr><td>Boolean</td><td>is, has, can, should prefix</td><td><code>$isActive</code></td></tr>
                                <tr><td>View folder</td><td>Plural lowercase</td><td><code>customer-orders</code></td></tr>
                                <tr><td>View file</td><td>Lowercase Blade file</td><td><code>index.blade.php</code></td></tr>
                                <tr><td>Database table</td><td>Plural snake_case</td><td><code>customer_orders</code></td></tr>
                                <tr><td>Database column</td><td>snake_case</td><td><code>total_amount</code></td></tr>
                                <tr><td>Foreign key</td><td>Singular name + _id</td><td><code>customer_id</code></td></tr>
                                <tr><td>URL</td><td>Lowercase plural kebab-case</td><td><code>/customer-orders</code></td></tr>
                                <tr><td>Route name</td><td>Lowercase dot notation</td><td><code>customer-orders.index</code></td></tr>
                                <tr><td>Migration</td><td>Descriptive snake_case</td><td><code>create_customer_orders_table</code></td></tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="code-block">
                        <div class="code-label">Easy rule to remember</div>
                        <pre><code>Classes      → PascalCase
Methods      → camelCase
Variables    → camelCase
Database     → snake_case
URLs         → kebab-case
Route names  → dot notation</code></pre>
                    </div>

                    <blockquote>
                        Good naming is not only about making code look clean. It creates a predictable
                        structure that helps developers understand how models, controllers, views,
                        routes, and database tables work together.
                    </blockquote>
                </section>
            </article>
        </div>
    </main>

    <footer>
        Laravel Naming Standards — Practical reference for students and developers.
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
