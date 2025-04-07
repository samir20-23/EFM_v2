**app/Models/Natuve.php**  
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Natuve extends Model
{
    protected $fillable = ['name'];
}
```

**app/Models/Saile.php**  
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saile extends Model
{
    protected $fillable = ['name', 'espace'];
}
```

**database/seeders/NatuveSeeder.php**  
```php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Natuve;

class NatuveSeeder extends Seeder
{
    public function run()
    {
        Natuve::create(['name' => 'Organic']);
        Natuve::create(['name' => 'Synthetic']);
    }
}
```

**database/seeders/SaileSeeder.php**  
```php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Saile;

class SaileSeeder extends Seeder
{
    public function run()
    {
        Saile::create(['name' => 'Warehouse 1', 'espace' => 200]);
        Saile::create(['name' => 'Warehouse 2', 'espace' => 350]);
    }
}
```

**app/Http/Controllers/NatuveController.php**  
```php
namespace App\Http\Controllers;

use App\Models\Natuve;
use Illuminate\Http\Request;

class NatuveController extends Controller
{
    public function index(Request $request)
    {
        $query = Natuve::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        $natuves = $query->paginate(5);
        return view('natuves.index', compact('natuves'));
    }

    public function create()
    {
        return view('natuves.create');
    }

    public function store(Request $request)
    {
        Natuve::create($request->validate([
            'name' => 'required',
        ]));
        return redirect()->route('natuves.index');
    }

    public function edit(Natuve $natuve)
    {
        return view('natuves.edit', compact('natuve'));
    }

    public function update(Request $request, Natuve $natuve)
    {
        $natuve->update($request->validate([
            'name' => 'required',
        ]));
        return redirect()->route('natuves.index');
    }

    public function destroy(Natuve $natuve)
    {
        $natuve->delete();
        return redirect()->route('natuves.index');
    }
}
```

**app/Http/Controllers/SaileController.php**  
```php
namespace App\Http\Controllers;

use App\Models\Saile;
use Illuminate\Http\Request;

class SaileController extends Controller
{
    public function index(Request $request)
    {
        $query = Saile::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        $sailes = $query->paginate(5);
        return view('sailes.index', compact('sailes'));
    }

    public function create()
    {
        return view('sailes.create');
    }

    public function store(Request $request)
    {
        Saile::create($request->validate([
            'name' => 'required',
            'espace' => 'required|numeric',
        ]));
        return redirect()->route('sailes.index');
    }

    public function edit(Saile $saile)
    {
        return view('sailes.edit', compact('saile'));
    }

    public function update(Request $request, Saile $saile)
    {
        $saile->update($request->validate([
            'name' => 'required',
            'espace' => 'required|numeric',
        ]));
        return redirect()->route('sailes.index');
    }

    public function destroy(Saile $saile)
    {
        $saile->delete();
        return redirect()->route('sailes.index');
    }
}
```

**routes/web.php**  
```php
use App\Http\Controllers\SaileController;
use App\Http\Controllers\NatuveController;

Route::resource('sailes', SaileController::class);
Route::resource('natuves', NatuveController::class);
```

**resources/views/sailes/index.blade.php**  
```blade
<form method="GET">
    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
    <button type="submit">Filter</button>
</form>

<a href="{{ route('sailes.create') }}">Add</a>

<table>
<tr><th>Name</th><th>Espace</th><th>Actions</th></tr>
@foreach($sailes as $saile)
<tr>
<td>{{ $saile->name }}</td>
<td>{{ $saile->espace }}</td>
<td>
<a href="{{ route('sailes.edit', $saile) }}">Edit</a>
<form method="POST" action="{{ route('sailes.destroy', $saile) }}" style="display:inline">@csrf @method('DELETE')<button>Delete</button></form>
</td>
</tr>
@endforeach
</table>
{{ $sailes->links() }}
```

**resources/views/sailes/create.blade.php**  
```blade
<form method="POST" action="{{ route('sailes.store') }}">
@csrf
<input name="name" placeholder="Name">
<input name="espace" placeholder="Espace">
<button>Save</button>
</form>
```

**resources/views/sailes/edit.blade.php**  
```blade
<form method="POST" action="{{ route('sailes.update', $saile) }}">
@csrf @method('PUT')
<input name="name" value="{{ $saile->name }}">
<input name="espace" value="{{ $saile->espace }}">
<button>Update</button>
</form>
```

**resources/views/natuves/index.blade.php**  
```blade
<form method="GET">
    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}">
    <button type="submit">Filter</button>
</form>

<a href="{{ route('natuves.create') }}">Add</a>

<table>
<tr><th>Name</th><th>Actions</th></tr>
@foreach($natuves as $natuve)
<tr>
<td>{{ $natuve->name }}</td>
<td>
<a href="{{ route('natuves.edit', $natuve) }}">Edit</a>
<form method="POST" action="{{ route('natuves.destroy', $natuve) }}" style="display:inline">@csrf @method('DELETE')<button>Delete</button></form>
</td>
</tr>
@endforeach
</table>
{{ $natuves->links() }}
```

**resources/views/natuves/create.blade.php**  
```blade
<form method="POST" action="{{ route('natuves.store') }}">
@csrf
<input name="name" placeholder="Name">
<button>Save</button>
</form>
```

**resources/views/natuves/edit.blade.php**  
```blade
<form method="POST" action="{{ route('natuves.update', $natuve) }}">
@csrf @method('PUT')
<input name="name" value="{{ $natuve->name }}">
<button>Update</button>
</form>
```
<!-- dsfja;lksdjf;kl a -->

**database/migrations/2024_01_01_000002_create_sailes_table.php**  
```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('sailes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('espace');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('sailes');
    }
};
```

**app/Http/Requests/NatuveRequest.php**  
```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NatuveRequest extends FormRequest
{
    public function authorize() {
        return true;
    }
    public function rules() {
        return ['name' => 'required|string|max:255'];
    }
}
```

**app/Http/Requests/SaileRequest.php**  
```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaileRequest extends FormRequest
{
    public function authorize() {
        return true;
    }
    public function rules() {
        return [
            'name' => 'required|string|max:255',
            'espace' => 'required|numeric|min:0'
        ];
    }
}
```

**app/Services/NatuveService.php**  
```php
namespace App\Services;

use App\Models\Natuve;

class NatuveService
{
    public function list($search = null) {
        return Natuve::when($search, fn($q) => $q->where('name', 'like', "%$search%"))
                     ->paginate(5);
    }
    public function create(array $data) {
        return Natuve::create($data);
    }
    public function update(Natuve $natuve, array $data) {
        return $natuve->update($data);
    }
    public function delete(Natuve $natuve) {
        return $natuve->delete();
    }
}
```

**app/Services/SaileService.php**  
```php
namespace App\Services;

use App\Models\Saile;

class SaileService
{
    public function list($search = null) {
        return Saile::when($search, fn($q) => $q->where('name', 'like', "%$search%"))
                    ->paginate(5);
    }
    public function create(array $data) {
        return Saile::create($data);
    }
    public function update(Saile $saile, array $data) {
        return $saile->update($data);
    }
    public function delete(Saile $saile) {
        return $saile->delete();
    }
}
```

**app/Http/Controllers/NatuveController.php**  
```php
namespace App\Http\Controllers;

use App\Models\Natuve;
use Illuminate\Http\Request;
use App\Services\NatuveService;
use App\Http\Requests\NatuveRequest;

class NatuveController extends Controller
{
    public function __construct(protected NatuveService $service) {}

    public function index(Request $request) {
        $natuves = $this->service->list($request->search);
        return view('natuves.index', compact('natuves'));
    }

    public function create() {
        return view('natuves.create');
    }

    public function store(NatuveRequest $request) {
        $this->service->create($request->validated());
        return redirect()->route('natuves.index');
    }

    public function edit(Natuve $natuve) {
        return view('natuves.edit', compact('natuve'));
    }

    public function update(NatuveRequest $request, Natuve $natuve) {
        $this->service->update($natuve, $request->validated());
        return redirect()->route('natuves.index');
    }

    public function destroy(Natuve $natuve) {
        $this->service->delete($natuve);
        return redirect()->route('natuves.index');
    }
}
```

**app/Http/Controllers/SaileController.php**  
```php
namespace App\Http\Controllers;

use App\Models\Saile;
use Illuminate\Http\Request;
use App\Services\SaileService;
use App\Http\Requests\SaileRequest;

class SaileController extends Controller
{
    public function __construct(protected SaileService $service) {}

    public function index(Request $request) {
        $sailes = $this->service->list($request->search);
        return view('sailes.index', compact('sailes'));
    }

    public function create() {
        return view('sailes.create');
    }

    public function store(SaileRequest $request) {
        $this->service->create($request->validated());
        return redirect()->route('sailes.index');
    }

    public function edit(Saile $saile) {
        return view('sailes.edit', compact('saile'));
    }

    public function update(SaileRequest $request, Saile $saile) {
        $this->service->update($saile, $request->validated());
        return redirect()->route('sailes.index');
    }

    public function destroy(Saile $saile) {
        $this->service->delete($saile);
        return redirect()->route('sailes.index');
    }
}
```

**resources/lang/en/messages.php**  
```php
return [
    'add' => 'Add',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'update' => 'Update',
    'name' => 'Name',
    'espace' => 'Espace',
    'search' => 'Search...',
];
```

**resources/lang/fr/messages.php**  
```php
return [
    'add' => 'Ajouter',
    'edit' => 'Modifier',
    'delete' => 'Supprimer',
    'update' => 'Mettre à jour',
    'name' => 'Nom',
    'espace' => 'Espace',
    'search' => 'Rechercher...',
];
```

**example blade translation**  
```blade
<label>{{ __('messages.name') }}</label>
```

<!-- test -->

**database/migrations/2024_01_01_000001_create_natuves_table.php**  
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('natuves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('natuves');
    }
};
```

**database/migrations/2024_01_01_000002_create_sailes_table.php**  
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('sailes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('espace');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('sailes');
    }
};
```

**app/Models/Natuve.php**  
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Natuve extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
}
```

**app/Models/Saile.php**  
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saile extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'espace'];
}
```

**app/Http/Requests/NatuveRequest.php**  
```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NatuveRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}
```

**app/Http/Requests/SaileRequest.php**  
```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaileRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name' => 'required|string|max:255',
            'espace' => 'required|numeric|min:0',
        ];
    }
}
```

**app/Services/NatuveService.php**  
```php
<?php

namespace App\Services;

use App\Models\Natuve;

class NatuveService
{
    public function list($search = null) {
        return Natuve::when($search, fn($q) => $q->where('name', 'like', "%$search%"))
                     ->paginate(5);
    }

    public function create(array $data) {
        return Natuve::create($data);
    }

    public function update(Natuve $natuve, array $data) {
        return $natuve->update($data);
    }

    public function delete(Natuve $natuve) {
        return $natuve->delete();
    }
}
```

**app/Services/SaileService.php**  
```php
<?php

namespace App\Services;

use App\Models\Saile;

class SaileService
{
    public function list($search = null) {
        return Saile::when($search, fn($q) => $q->where('name', 'like', "%$search%"))
                    ->paginate(5);
    }

    public function create(array $data) {
        return Saile::create($data);
    }

    public function update(Saile $saile, array $data) {
        return $saile->update($data);
    }

    public function delete(Saile $saile) {
        return $saile->delete();
    }
}
```

**app/Http/Controllers/NatuveController.php**  
```php
<?php

namespace App\Http\Controllers;

use App\Models\Natuve;
use Illuminate\Http\Request;
use App\Services\NatuveService;
use App\Http\Requests\NatuveRequest;

class NatuveController extends Controller
{
    public function __construct(protected NatuveService $service) {}

    public function index(Request $request) {
        $natuves = $this->service->list($request->search);
        return view('natuves.index', compact('natuves'));
    }

    public function create() {
        return view('natuves.create');
    }

    public function store(NatuveRequest $request) {
        $this->service->create($request->validated());
        return redirect()->route('natuves.index');
    }

    public function edit(Natuve $natuve) {
        return view('natuves.edit', compact('natuve'));
    }

    public function update(NatuveRequest $request, Natuve $natuve) {
        $this->service->update($natuve, $request->validated());
        return redirect()->route('natuves.index');
    }

    public function destroy(Natuve $natuve) {
        $this->service->delete($natuve);
        return redirect()->route('natuves.index');
    }
}
```

**app/Http/Controllers/SaileController.php**  
```php
<?php

namespace App\Http\Controllers;

use App\Models\Saile;
use Illuminate\Http\Request;
use App\Services\SaileService;
use App\Http\Requests\SaileRequest;

class SaileController extends Controller
{
    public function __construct(protected SaileService $service) {}

    public function index(Request $request) {
        $sailes = $this->service->list($request->search);
        return view('sailes.index', compact('sailes'));
    }

    public function create() {
        return view('sailes.create');
    }

    public function store(SaileRequest $request) {
        $this->service->create($request->validated());
        return redirect()->route('sailes.index');
    }

    public function edit(Saile $saile) {
        return view('sailes.edit', compact('saile'));
    }

    public function update(SaileRequest $request, Saile $saile) {
        $this->service->update($saile, $request->validated());
        return redirect()->route('sailes.index');
    }

    public function destroy(Saile $saile) {
        $this->service->delete($saile);
        return redirect()->route('sailes.index');
    }
}
```

**resources/lang/en/messages.php**  
```php
<?php

return [
    'add' => 'Add',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'update' => 'Update',
    'name' => 'Name',
    'espace' => 'Espace',
    'search' => 'Search...',
];
```

**resources/lang/fr/messages.php**  
```php
<?php

return [
    'add' => 'Ajouter',
    'edit' => 'Modifier',
    'delete' => 'Supprimer',
    'update' => 'Mettre à jour',
    'name' => 'Nom',
    'espace' => 'Espace',
    'search' => 'Rechercher...',
];
```

**resources/views/natuves/index.blade.php**  
```blade
<form method="GET">
    <input name="search" placeholder="{{ __('messages.search') }}" value="{{ request('search') }}">
</form>

<a href="{{ route('natuves.create') }}">{{ __('messages.add') }}</a>

@foreach ($natuves as $natuve)
    <div>{{ $natuve->name }}</div>
    <a href="{{ route('natuves.edit', $natuve) }}">{{ __('messages.edit') }}</a>
    <form action="{{ route('natuves.destroy', $natuve) }}" method="POST">
        @csrf @method('DELETE')
        <button>{{ __('messages.delete') }}</button>
    </form>
@endforeach

{{ $natuves->links() }}
```

**resources/views/natuves/create.blade.php**  
```blade
<form method="POST" action="{{ route('natuves.store') }}">
    @csrf
    <label>{{ __('messages.name') }}</label>
    <input name="name" value="{{ old('name') }}">
    <button>{{ __('messages.add') }}</button>
</form>
```

**resources/views/natuves/edit.blade.php**  
```blade
<form method="POST" action="{{ route('natuves.update', $natuve) }}">
    @csrf @method('PUT')
    <label>{{ __('messages.name') }}</label>
    <input name="name" value="{{ old('name', $natuve->name) }}">
    <button>{{ __('messages.update') }}</button>
</form>
```

**resources/views/sailes/index.blade.php**  
```blade
<form method="GET">
    <input name="search" placeholder="{{ __('messages.search') }}" value="{{ request('search') }}">
</form>

<a href="{{ route('sailes.create') }}">{{ __('messages.add') }}</a>

@foreach ($sailes as $saile)
    <div>{{ $saile->name }} - {{ $saile->espace }}</div>
    <a href="{{ route('sailes.edit', $saile) }}">{{ __('messages.edit') }}</a>
    <form action="{{ route('sailes.destroy', $saile) }}" method="POST">
        @csrf @method('DELETE')
        <button>{{ __('messages.delete') }}</button>
    </form>
@endforeach

{{ $sailes->links() }}
```

**resources/views/sailes/create.blade.php**  
```blade
<form method="POST" action="{{ route('sailes.store') }}">
    @csrf
    <label>{{ __('messages.name') }}</label>
    <input name="name" value="{{ old('name') }}">
    <label>{{ __('messages.espace') }}</label>
    <input name="espace" value="{{ old('espace') }}">
    <button>{{ __('messages.add') }}</button>
</form>
```

**resources/views/sailes/edit.blade.php**  
```blade
<form method="POST" action="{{ route('sailes.update', $saile) }}">
    @csrf @method('PUT')
    <label>{{ __('messages.name') }}</label>
    <input name="name" value="{{ old('name', $saile->name) }}">
    <label>{{ __('messages.espace') }}</label>
    <input name="espace" value="{{ old('espace', $saile->espace) }}">
    <button>{{ __('messages.update') }}</button>
</form>
```
<!-- tets2 -->


### **resources/views/natuves/index.blade.php**
```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" class="mb-3">
        <input name="search" class="form-control" placeholder="{{ __('messages.search') }}" value="{{ request('search') }}">
    </form>

    <a href="{{ route('natuves.create') }}" class="btn btn-primary mb-3">{{ __('messages.add') }}</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('messages.name') }}</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($natuves as $natuve)
            <tr>
                <td>{{ $natuve->name }}</td>
                <td>
                    <a href="{{ route('natuves.edit', $natuve->id) }}" class="btn btn-warning btn-sm">{{ __('messages.edit') }}</a>
                    <form action="{{ route('natuves.destroy', $natuve->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $natuves->links() }}
</div>
@endsection
```

---

### **resources/views/natuves/create.blade.php**
```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('natuves.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">{{ __('messages.name') }}</label>
            <input name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <button class="btn btn-success">{{ __('messages.add') }}</button>
    </form>
</div>
@endsection
```

---

### **resources/views/natuves/edit.blade.php**
```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('natuves.update', $natuve->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">{{ __('messages.name') }}</label>
            <input name="name" class="form-control" value="{{ old('name', $natuve->name) }}">
        </div>
        <button class="btn btn-primary">{{ __('messages.update') }}</button>
    </form>
</div>
@endsection
```

---

### **resources/views/sailes/index.blade.php**
```blade
@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" class="mb-3">
        <input name="search" class="form-control" placeholder="{{ __('messages.search') }}" value="{{ request('search') }}">
    </form>

    <a href="{{ route('sailes.create') }}" class="btn btn-primary mb-3">{{ __('messages.add') }}</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.espace') }}</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sailes as $saile)
            <tr>
                <td>{{ $saile->name }}</td>
                <td>{{ $saile->espace }}</td>
                <td>
                    <a href="{{ route('sailes.edit', $saile->id) }}" class="btn btn-warning btn-sm">{{ __('messages.edit') }}</a>
                    <form action="{{ route('sailes.destroy', $saile->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">{{ __('messages.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $sailes->links() }}
</div>
@endsectio 
<!-- tetst3  -->
### **resources/views/layouts/app.blade.php**
```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'EFM') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'EFM') }}</a>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```