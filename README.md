# PHP MVC – The Video Library

A video library has a significant number of DVDs. Each DVD contains one movie. Each individual DVD is assigned a unique number. It goes without saying that there can be multiple copies of a movie.

The application provides the following functionalities:

- [x] **Display an overview of all movies, sorted alphabetically by title**
  - [x] title
  - [x] DVD numbers (ids)
  - [x] how many copies are available in the video library

- The first column contains the title of the movie.  
- The second column contains the numbers of all DVDs that bear this title.  
- The third column shows how many copies of this title are currently available in the video library.  
- The available numbers are displayed in bold in the second column.

- [x] **Search by number**

Result: Title | Number(s) | Copies available

- [x] **Enter a new title.**

- A title is requested.  
- Provide an error message if the title already exists.  
- There are no copies available of this title after creation.

- [x] **Enter a new copy of a title.**

- _A dropdown list of all titles is displayed, and a copy number must be entered.  
- Provide an error message if the copy number already exists.  
- Both a title from the list must be selected and a number must be entered.  
- A new copy is initially available in the video library._

- I have added an option in the movie list because the DVD number is automatically regenerated in the database.

- [x] **Remove a title.**

- A title must be chosen from a dropdown list.  
- All copies of this title will be deleted simultaneously.

- [x] **Remove a copy.**

- A number must be chosen from a dropdown list of the numbers of all copies.

- [x] **Rent a movie.**

- The number of the copy is entered, after which this copy is no longer available in the video library.

- [x] **Return a movie.**

- The number of the returned copy is entered, after which it is available again in the video library.

- [x] All these functionalities must be selectable from a main menu, which is displayed when the application is called.

**Extension**

- [x] Ensure that a database keeps a list of users and their passwords.

- [x] Extend the application so that, before the main menu appears and a task can be executed, the employee must log in with their personal username and password.
