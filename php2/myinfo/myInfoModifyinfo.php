<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";echo "<pre>";
    var_dump($_SESSION);
    
    $youName=$_SESSION['youName'];
    $youEmail=$_SESSION['youEmail'];
    $sql = "SELECT * FROM members2 WHERE  youEmail = '{$youEmail}'";
    $Result = $connect -> query($sql);
    $Info = $Result -> fetch_array(MYSQLI_ASSOC);

    echo "</pre>";echo "<pre>";
        var_dump($Info);
    echo "</pre>";
    // 생년월일 세팅
    $oldYouBirth = $Info['youBirth'];
    $youBirth = explode("-", $Info['youBirth']);
    echo $youBirth[0];
    echo $youBirth[1];
    echo $youBirth[2];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../html/assets/css/style.css">
    <!-- SCRIPT -->
    <script defer src="../html/assets/js/common.js"></script>
</head>
<body >
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->
    <main id="main" class="mt70 mb20">
        <?php include "../include/abbHeader.php" ?>
        <!-- //header -->
        <div class="info__logo">
            <h1>Abide By Beauty</h1>
        </div>
        <!-- //header -->
        <div class="info__wrap">
            <div class="info__title mt30 info__bmStyle">
                <h1><?=$youName ?>님></h1>
            </div>
            <div class="info__sec mt100">
                <div class="info__list">
                    <div class="aside1 aside__bmStyle">
                        <span>나의정보</span>
                        <ul>
                            <li><a href="#">프로필 설정</a></li>
                            <li><a href="#" class="active">회원정보 수정</a></li>
                        </ul>
                    </div>
                    <div class="aside2 aside__bmStyle">
                        <span>나의정보</span>
                        <ul>
                            <li><a href="myinfoMywrite.php" >내가 쓴 게시물</a></li>
                            <li><a href="#" >내가 쓴 댓글</a></li>
                            <li><a href="#" >내 제품 기록</a></li>
                        </ul>
                    </div>
                    <div class="aside3 ">
                        <span>알림</span>
                        <ul>
                            <li><a href="#">알림설정</a></li>
                        </ul>
                    </div>
                </div>
                <div class="info__view">
                    <div class="info__view__title">
                        <h2>회원정보 수정</h2>
                    </div>
                    <div class="info__form" >
                        <div>
                            <p class="info__title">비밀번호 수정</p>
                        </div>
                        <div class="info__bmStyle2">
                            <form action="#" name="#" method="post"></form>
                                <fieldset>
                                    <legend class="blind">회원정보 수정 비밀번호입력창</legend>        
                                    <div class="inputStyleInfo">
                                        <label for="youPass"></label>
                                        <input type="password" id="youPass" name="youPass" class="inputStyle" placeholder="기존 비밀번호를 입력해 주세요" required>
                                        <p class="joinChkmsg" id="Comment"></p>
                                    </div>
                                    <div class="inputStyleInfo">
                                        <label for="newYouPass"></label>
                                        <input type="password" id="newYouPass" name="newYouPass" class="inputStyle" placeholder="신규 비밀번호를 입력해 주세요" required>
                                        <p class="joinChkmsg" id="Comment"></p>
                                    </div>
                                    <div class="inputStyleInfo">
                                        <label for="newYouPassC"></label>
                                        <input type="password" id="newYouPassC" name="newYouPassC" class="inputStyle" placeholder="신규 비밀번호를 한번더 입력해 주세요" required>
                                        <p class="joinChkmsg" id="Comment"></p>
                                    </div>
                                </fieldset>
                            </form>
                            <p class="info__desc">· 신규 비밀번호는 대소문자, 숫자, 특수문자를 포함해 주세요</p>
                            <button type="button" class=" btnStyle3" onclick="passUpdate()">비밀번호 수정</button>
                        </div>
                    </div>
                    <div class="info__form userinfo__form" >
                        <div>
                            <p class="info__title">개인정보 수정</p>
                        </div>
                        <div class="info__bmStyle2">
                            <form action="#" name="#" method="post"></form>
                                <fieldset>
                                    <legend class="blind">회원정보 수정 비밀번호입력창</legend>        
                                    <div class="inputStyleInfo">
                                        <label for="youName"></label>
                                        <input type="text" id="youName" name="youName" class="inputStyle" placeholder="이름" value="<?=$Info['youName']?>" readonly >
                                        
                                    </div>
                                    <div class="user__birth__inner">
                                        <div class="inputStyleInfo user__birth">
                                            <label for="youYear"></label>
                                                <select type="text" id="youYear" name="youYear" class="inputStyle" required>
                                                </select>
                                            </div>
                                            <div class="inputStyleInfo user__birth">
                                                <label for="youMonth"></label>
                                                <select type="text" id="youMonth" name="youMonth" class="inputStyle" required>
                                                </select>
                                            </div>
                                            <div class="inputStyleInfo user__birth">
                                                <label for="youDay"></label>
                                                <select type="text" id="youDay" name="youDay" class="inputStyle" required>
                                                </select>
                                            </div>
                                        <input type="hidden" id="oldYouBirth" name="oldYouBirth" class="inputStyle" value="<?=$oldYouBirth?>">
                                    </div>
                                    <div class="inputStyleInfoRadio">
                                        <label for="male" class="rad-label">
                                            <input type="radio" class="rad-input" name="gender" id="male"  value="male" <?if($Info['youGender']=='male'){ echo "checked";}?>>
                                            <div class="rad-design"></div>
                                            <div class="rad-text">남성</div>
                                        </label>
                                        <label for="female" class="rad-label">
                                            <input type="radio" class="rad-input" name="gender" id="female"  value="female" <?if($Info['youGender']=='female'){ echo "checked";}?>>
                                            <div class="rad-design"></div>
                                            <div class="rad-text">여성</div>
                                        </label>
                                    </div>
                                    <div class="user__phone__inner">
                                        <div  class="inputStyleInfo youPhone"> 
                                                <label for="youPhone"></label>
                                                <input type="text" id="youPhone" name="youPhone" class="inputStyle" placeholder="전화번호" value="<?=$Info['youPhone']?>">
                                                <input type="hidden" id="chk" name="youPhone" class="inputStyle" placeholder="" value="<?=$Info['youPhone']?>">
                                        </div>
                                        <button type="button" class="phonekBtn update infoBtnStyle1 " onclick="phoneChk()">변경</button>
                                    </div>
                                    <div class="user__phone__inner__chk">
                                        <div  class="inputStyleInfo chkNumber"> 
                                                <label for="changePhoneChk"></label>
                                                <input type="text" id="changePhoneChk" name="changePhoneChk" class="inputStyle" placeholder="인증번호를 입력해주세요" >
                                        </div>
                                        <div  class="inputStyleInfo chkNumberTimer"> 
                                                <label for="changePhoneChk"></label>
                                                <input type="text" id="changePhoneChkTime" name="changePhoneChk" class="inputStyle" value="3:00">
                                        </div>
                                        <button type="button" class="phonekBtn infoBtnStyle1 " onclick="phoneChkEnd()">입력하기</button>
                                    </div>
                                    <div class="inputStyleInfo">
                                        <label for="memberID"></label>
                                        <input type="text" id="memberID" name="memberID" class="inputStyle" placeholder="닉넴" value = "<?=$Info['youEmail']?>" readonly >
                                    </div>
                                </fieldset>
                            </form>
                            
                            <button type="button" class=" btnStyle3 ">회원정보 수정</button>
                        </div>
                    </div>
                    <div class="info__form" >
                        <div>
                            <p class="info__title">sns 계정연동 관리</p>
                        </div>
                        <div class="info__bmStyle2">
                            <form action="#" name="#" method="post"></form>
                                <fieldset>
                                    <legend class="blind">카카오 </legend>        
                                    <div class="inputStyleToggle">
                                        <div class="kakaoDiv">
                                            <p>카카오</p>
                                            <input type="checkbox" id="toggle" hidden>
                                            <label for="toggle" class="toggleSwitch" id="kakaoLink">
                                                <span class="toggleButton" id="kakaoLink"></span>
                                            </label>
                                        </div>
                                        
                                    </div>
                                    <div class="inputStyleKakao">
                                         
                                    </div>

                                </fieldset>
                            </form>
                            
                            <button type="button" class=" btnStyle3 ">카카오연동 수정</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script>
        let isPassCheck = false;
        const oldYouBirth = document.getElementById('oldYouBirth');
        const [oldyear, oldmonth, oldday] = oldYouBirth.value.split('-');
        console.log(oldday + "oldday")
        function passUpdate(){
            // retrun true;
        }
        function phoneChk(){
            document.querySelector('.user__phone__inner__chk').style.display = 'flex';
            document.querySelector("#youPhone").readOnly = true;
        }
        function phoneChkEnd(){
            document.querySelector('.user__phone__inner__chk').style.display = 'none';
            document.querySelector('.phonekBtn.update').innerText='인증완료';
            document.querySelector('.phonekBtn.update').disabled = true;
        }
        // 윈도우 로드시 window.onload 함수 쓴것과 같음
        // 각 input스타일에서 포커스아웃할때(바깥클릭 and tab클릭)실행되게 해놓은 함수
      

        $(document).ready(function() {

            //상단에서 선언한 oldyear, oldmonth, oldday을 기준으로 옵션을 설정해줌 
            //

            // 연도 select box 만들기
            var yearSelect = $('#youYear');
            var currentYear = new Date().getFullYear();
            for (var i = currentYear; i >= 1950; i--) {
                yearSelect.append($('<option>', {value: i, text: i + '년'}));
            }

            // 월 select box 만들기
            var monthSelect = $('#youMonth');
            for (var i = 1; i <= 12; i++) {
                monthSelect.append($('<option>', {value: i, text: i + '월'}));
            }

            // 일 select box 만들기
            var daySelect = $('#youDay');
                     
            var year = $('#youYear').val();
            var month = $('#youMonth').val();
            var daysInMonth = new Date(oldyear, oldmonth, 0).getDate(); // 해당 월의 일 수 계산

            for (var i = 1; i <= daysInMonth; i++) {
                var option = $('<option>', { value: i, text: i + '일' });
                if (i == parseInt(oldday)) {
                    option.prop('selected', true);
                }
                daySelect.append(option);
            }

            $('#youYear').val(parseInt(oldyear)); // oldyear에 해당하는 연도 옵션 선택
            $('#youMonth').val(parseInt(oldmonth)); // oldmonth에 해당하는 월 옵션 선택
            $('#youDay').val(parseInt(oldday)); // oldmonth에 해당하는 월 옵션 선택

            //월을 변경하면 일값도 초기화 변경되게 설정
            $('#youMonth').on('change', function() {
                daySelect.empty(); // 기존 옵션 제거
                for (var i = 1; i <= daysInMonth; i++) {
                var option = $('<option>', { value: i, text: i + '일' });
                
                daySelect.append(option);
            }
            });
            

        });

        
    </script>
</body>
</html> 