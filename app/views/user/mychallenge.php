<table class="table">
    <h2>My Challenge</h2>
    <thead>
        <tr>
            <td>book name</td>
            <td>start date</td>
            <td>end date</td>
            <td>renew time</td>
            <td>mark as compeleted</td>
        </tr>
        <tbody>
           <?php
           $challengecontorller=new ChallengeController();
           $challengecontorller->get_my_challenge();?>
        </tbody>
    </thead>
</table>