#### command to create observer
php artisan make:observer UserObserver --model=User
#### remarque
dispatcher les event 
type event:
- created
- updated
- deleted
- forceDeleted
- restored
- creating
- updating
- deleting
- forceDeleting
- restoring
##### how to dispatch