
@foreach($data as $d)
$number="{{$d->code}}";
$message="{{$d->number}}";
$ch = curl_init("http://brandedsms.net//api/sms-api.php?username=umer&password=umer&phone=".$number."&sender=Step&message=".$code);
curl_exec($ch);

