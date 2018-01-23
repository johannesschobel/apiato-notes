### Note Apiato Container

#### Configuration
1) Simply run `composer update` to install the new dependencies
2) Add (new) `Migration` files (if needed)
3) Adapt the `Configs/notes.php` Configuration file to your needs
4) Add new `entities` that can have `Note`s in the `Configs/note-container.php` file.
5) Be sure to also add the respective `CheckTask` for this new entry in order to allow checking, if the `author` has access 
to the entity he wants to add / update / delete the `Note`.
6) Finally, add the `HasManyNotes` Trait to the model you want to have `Note`s.