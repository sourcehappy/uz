
 <div class="back-to">
 <a title="���ض���" onclick="myScroll()" href="#logo" class="back-top">���ض���</a></div>
 <script type="text/javascript"> 
//��ô��ȡ��ҳ�ĸ߶� ��ҳ��һ�����͹���������׶� 
function myScroll() 
{ 
//ǰ���ǻ�ȡchrome��һ������� �����ȡ��������ie�� ����ie�İ취��ȡ 
var x=document.body.scrollTop||document.documentElement.scrollTop;
var timer=setInterval(function(){ 
x=x-100; 
if(x<100) 
{ 
x=0; 
window.scrollTo(x,x); 
clearInterval(timer); 
} 
window.scrollTo(x,x); 
},"5");

}
</script>
