# QuickSetUp

웹 개발과 서버, 클라이언트, DB를 조금은 공부해보자는 취지로 Apache + PHP + MySQL 과 Bootstrap 이용해 빠른 다운로드 웹 사이트를 지었습니다.

![상세보기](https://github.com/HaeBun/QuickSetUp/blob/main/image/profile/1.jpg?raw=true)

MySQL을 이용해 회원가입시 SQL 명령어 INSERT 를 이용해 구현했습니다.

세션을 이용해 header 에 로그인, 로그아웃 기능을 구현했습니다.

body 부분에 검색바와 아래 프로그램 정보를 program_info 테이블에 필요할 만한 데이터를 삽입해두었습니다.

검색바는 SQL 명령어 SELECT 를 이용해 구현했습니다.

프로그램 정보들은 다운로드 가장 많은 횟수 순으로 내림차순 정리를 하였습니다. 

다운로드 횟수 증가는 클릭 시 download_increase.php 를 거쳐 SQL 명령어 UPDATE 를 이용해 구현했습니다.

다음 사진은 테이블 구조입니다.

![상세 보기](https://github.com/HaeBun/QuickSetUp/blob/main/image/profile/2.jpg?raw=true)

![상세 보기](https://github.com/HaeBun/QuickSetUp/blob/main/image/profile/3.jpg?raw=true)
