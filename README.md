# forum

A forum built with TDD.

## Models

-   User
-   Thread
-   Reply

A. Thread belongs to a User.

B. Reply belongs to a User.

C. Reply belongs to a Thread.

## Lessons

1.  Using SQLite as a test database, especially with `:memory:` as the database instead of a file, is a frictionless setup in comparison with preparing a full MySQL database.

2.  Always follow the `arrange -> act -> assert` pattern.

```php
/** @test */
public function a_user_can_browse_all_threads()
{
    // Arrange -> prepare needed data
    $threads = factory(\App\Thread::class, 3)->create();

    // Act -> do the expected actions
    $result = $this->get('/threads');

    // Assert -> assert the expected behaviour
    $threads->each(function ($thread) use ($result) {
        $result->assertSee($thread->title);
    });
}
```
