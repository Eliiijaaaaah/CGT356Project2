CREATE TABLE Project2Logs(
  LoginAttemptDate datetime PRIMARY KEY,
	REMOTE_ADDR varchar(20),
	HTTP_HOST varchar(50),
  AttemptedUserID varchar(20),
  HTTP_USER_AGENT varchar(255),
  Success boolean NOT NULL
);
