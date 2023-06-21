### dev

```bash
$ php artisan serve
```

### compile

```bash
$ pnpm dev
```

#### generate a new database

```bash
$ php artisan make:migration create_tasks_table --create=tasks
```

#### migrate

```bash
$ php artisan migrate
```

#### rollback

```bash
$ php artisan migrate:rollback
```

#### seed

```bash
$ php artisan db:seed
```

#### create a new model

```bash
$ php artisan make:model Task
```

#### create a new controller

```bash
$ php artisan make:controller TaskController
```
