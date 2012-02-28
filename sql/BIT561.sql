CREATE DATABASE IF NOT EXISTS BIT561;
USE BIT561;

DROP TABLE IF EXISTS `tablemaps`;

CREATE TABLE tablemaps (
    map_ID                              int(10) unsigned not null auto_increment,
      primary key (map_ID),
    tableName                           varchar(50) not null,
    browserFormName                     varchar(50) not null,
    dbColumnName                        varchar(50) not null,
    queryType                           varchar(20) not null,
    dataType                            varchar(20) not null,
    seqNum                              float not null,
    entryDate                           timestamp );
    
 /*+
    TABLE::tablename=tablemaps::database=BIT561::
        description=Contains the browser to database field maps that allow writing
           dynamic SQL.;;
    FIELD::fieldname=tableName::
        description=The table the map record applies to.;;
    FIELD::fieldname=browserFormName::
        description=The browser form has a name for the data.  Most of the time
             it will match the table column name, but it doesn't have to.;;
    FIELD::fieldname=dbColumnName::
        description=The column the data is to be stored in or retrieved from.;;
    FIELD::fieldname=queryType::
        description=What kind of query is the map record used with.  Options are
              'select', 'insert', or 'update'.;;
    FIELD::fieldname=dataType::
        description=Used to determine whether the SQL values list needs to have
              quotes around the data or not.  Options are 'alpha' or 'numeric'.;;
    FIELD::fieldname=seqNum::
        description=Used to sort the order of the field names for a table.  Allows
              control over the order of column names in SQL statements.
*/


DROP TABLE IF EXISTS `masterid`;

CREATE TABLE masterid (
    object_ID                         char(23) not null,
       primary key (object_ID),
    tableName                         varchar(25) not null,
    authoroid                         char(23) not null,
    entryDate                         timestamp );
    
 /*+
    TABLE::tablename=masterid::database=BIT561::
        description=Every object that gets created in the database gets a masterid
             record.  Given an object_ID, the object can be found anywhere in the
             database using the masterid table.;;
    FIELD::fieldname=object_ID::
        description=Each record in most tables gets a 23 character object_ID composed
             of twenty randomly created lowercase alpha letters.  Each group of five
             letters is followed with a hyphen, e.g., aaaaa-aaaaa-aaaaa-aaaaa.;;
    FIELD::fieldname=tableName::
        description=Where is the object going to be stored?;;
    FIELD::fieldname=authoroid::
        description=Foreign key into the authors table.;;
    FIELD::entryDate::
        description=The time of entry into the table.  Updated when modifications occur.
 */

DROP TABLE IF EXISTS `projectfiles`;

CREATE TABLE projectfiles (
    object_ID                        char(23) not null,
        primary key (object_ID),
    source                           varchar(255) not null,
    destination                      varchar(255) not null,
    project                          varchar(50) not null,
    name                             varchar(255) not null,
    description                      varchar(5000),
    category                         varchar(50),
    entryDate                        timestamp );
    
/*+
    TABLE::tablename=projectfiles::database=BIT561::
        description=Holds a record for each file in a project.  The record contains
            the files location and the project its in as primary pieces of information.
     FIELD::fieldname=object_ID::
        description=Key with 20 randomly chosen lowercase alpha characters separated
            into groups of five with hyphens in between the groups.;;
     FIELD::fieldname=source::
        description=The full path and name of a file in the project's source documents.;;
     FIELD::fieldname=destination::
        description=The full path name where an html file generated by autodocumentation
            will be stored.;;
     FIELD::fieldname=project::
        description=The name of the project a file related to.  All autodocumented files
            in the project can be pulled to guide automatic generation of a documentation
            web site.;;
      FIELD::fieldname=name::
        description=Short, one line description of the file being recorded.;;
      FIELD::fieldname=description::
        description=A full description of the contents and purpose of a project file.  Any 
            other information of note regarding the file and its operation can be included.;;
      FIELD::fieldname=category::
        description=A one word description of the file chosen by whomever enters the data.;;
      FIELD::fieldname=entryDate;;
         description=The date and time of record creation or update.
 */

DROP TABLE IF EXISTS `test`;

CREATE TABLE test (
  test_ID            int not null auto_increment,
    primary key (test_ID),
  description        text not null,
  success            varchar(20),
  entryDate          timestamp );

/*+
  TABLE::tablename=test::database=BIT561::
    description=Holds troubleshooting data generated while executing PHP.;;
  FIELD::fieldname=description::
    description=Contains the message sent from the test location to the table.;;
  FIELD::fieldname=success::
    description=Used to indicate success with "true" or failure with "false".
      Used with DBManager assert.;;
      FIELD::fieldname=entryDate;;
         description=The date and time of record creation or update.;;
*/

DROP TABLE IF EXISTS `users`;

CREATE TABLE users (
    object_ID   INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (object_ID),
    userName    VARCHAR(100),
    firstName   VARCHAR(100),
    lastName    VARCHAR(100),
    email       VARCHAR(100),
    password    varchar(20)
);
