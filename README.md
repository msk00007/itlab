# itlab
database name : login_db
table for user details : itlab   // columns : id primarykey auto increment, name, email, phone , dob, oassword, gender, address, creditcard;
table for booklist : book_catalogue  // columns : BooksandMagazines primarykey, Author, Publication, Price;
table for user cartlist : book_list  // columns : b_id primarykey , id, bookname, quantity, price  //unique constraint on combined(id,bookname);
