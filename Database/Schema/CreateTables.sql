--Create Database
CREATE DATABASE  FiestaHomesDB

--Create tables

CREATE TABLE households(
    HouseHoldID INT(11) AUTO_INCREMENT PRIMARY KEY,
    HouseHoldName VARCHAR(255),
    HouseNo VARCHAR(255),
    Street VARCHAR(255),
    isActive BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
);

CREATE TABLE datacenter(
    DataCenterID INT (11) AUTO_INCREMENT PRIMARY KEY,
    FirsName VARCHAR(255),
    MiddleName VARCHAR(255),
    LastName VARCHAR(255),
    Suffix VARCHAR(100),
    Gender VARCHAR(50),
    BirthDate DATE,
    ContactNo VARCHAR(255),
    EmailAddress VARCHAR(255),
    HouseHoldID INT(11),
    QRCode VARCHAR(MAX),
    isActive BIT,
    isResident BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
);

CREATE TABLE householdcontactpersons(
    HCPID INT(11) AUTO_INCREMENT PRIMARY KEY,
    HouseHoldID INT(11),
    ResidentID INT(11),
    PriorityOrder INT(11),
    isActive BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
);

CREATE TABLE useraccount(
    UserID INT(11) AUTO_INCREMENT PRIMARY KEY,
    DataCenterID INT(11),
    FirsName VARCHAR(255),
    MiddleName VARCHAR(255),
    LastName VARCHAR(255),
    Suffix VARCHAR(100),
    Gender VARCHAR(50),
    BirthDate DATE,
    ContactNo VARCHAR(255),
    EmailAddress VARCHAR(255),
    HouseHoldID INT(11),
    QRCode VARCHAR(MAX),
    isActive BIT,
    AccountType NVARCHAR(512),
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
);

CREATE TABLE Gates(
    GateID INT(11) AUTO_INCREMENT PRIMARY KEY,
    Description NVARCHAR(255),
    isActive BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
)

CREATE TABLE GateAssignments(
    GAID INT (11) AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    GateID INT,
    isActive BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
)

CREATE TABLE  gatepasslogs(
    GPLogID INT(11) AUTO_INCREMENT PRIMARY KEY,
    DataCenterID INT(11), -- visitor i
    QRCode NVARCHAR(255),
    LogType NVARCHAR(255), --if IN or OUT
    LoggerType NVARCHAR(255),  --if Resident or Visitor
    ScannedBy INT (11), -- gate personnel accountID
    TargetHouseHoldID INT, --household intended by visitor or household of the resident
    PurposeOfLog NVARCHAR(512), --if visitor -> state reason of visit, if resident leave blank
    CreatedBy INT(11), 
	CreatedDateTime DATETIME
);

CREATE TABLE BlockedVistors(
    BVID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT (11), --Visitor ID,
    isActive BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
);

CREATE TABLE residentreports(
    ReportID INT(11) AUTO_INCREMENT PRIMARY KEY,
    ReporterID INT(11), --resident datacenterId
    ReportType VARCHAR(255),
    ReportDetails VARCHAR(512),
    ReportStatus VARCHAR(255),
    ReportRemarks VARCHAR(255),
    isActive BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
);

CREATE TABLE ReportTypes ( 
    ReportTypeID INT(11) AUTO_INCREMENT PRIMARY KEY,
    Description VARCHAR(512),
    isActive BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
);

CREATE TABLE announcementtypes ( 
    ATID INT(11) AUTO_INCREMENT PRIMARY KEY,
    Description VARCHAR(512),
    isActive BIT,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
);

CREATE TABLE announcements(
    AnnouncementID INT(11) AUTO_INCREMENT PRIMARY KEY,
    ATID INT,
    Title VARCHAR(512),
    Details VARCHAR(4000),
    isActive BIT,
    isPublished BIT,
    PublishedBy INT(11),
    PublishedDateTime DATETIME,
    UnpublishedBy INT(11),
    UnpublishedDateTime DATETIME,
    ExpiryDate DATE,
    CreatedBy INT(11), 
	CreatedDateTime DATETIME,
	UpdatedBy INT(11), 
	UpdatedDateTime DATETIME
    FOREIGN KEY (ATID) References announcementtypes(ATID)
);