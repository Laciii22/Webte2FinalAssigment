// submitVotingCode.js
function submitVotingCode() {
    var votingCode = document.getElementById("votingCode").value;
    console.log("Happened");
    var url = "{{ route('test', ':votingCode') }}";
    url = url.replace(':votingCode', encodeURIComponent(votingCode));
    window.location.href = url;
}
