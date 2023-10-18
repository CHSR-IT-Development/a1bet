<?php


function generateReferralCode($conn)
{
    $idExists = true;

    while ($idExists) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $stmt = $conn->prepare("SELECT * FROM players WHERE ref_code=?"); // Changed to players table
        $stmt->bind_param("s", $randomString);
        $stmt->execute();

        if ($stmt->fetch() === NULL) {
            $idExists = false;
        }

        $stmt->close();
    }

    return $randomString;
}

function getPlayerByReferralCode($conn, $referralCode)
{
    $stmt = $conn->prepare("SELECT id FROM players WHERE ref_code = ?");
    $stmt->bind_param("s", $referralCode);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function getCommissionByLevel($conn)
{
    $stmt = $conn->prepare("SELECT commission FROM levels");
    $stmt->execute();
    $commissions = [];
    $results = $stmt->get_result();

    while ($row = $results->fetch_assoc()) {
        $commissions[] = $row['commission'];
    }

    return $commissions;
}

function getReferrerIDByLevel($conn, $refereeID, $desiredLevel)
{
    $currentLevel = 0;

    $stmt = $conn->prepare("SELECT referrer_id FROM referrals WHERE referee_id = ?");

    while ($currentLevel <= $desiredLevel) {
        $stmt->bind_param("i", $refereeID);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && $result['referrer_id']) {
            if ($currentLevel == $desiredLevel) {
                // If the current level matches the desired level, return the referrer ID
                return $result['referrer_id'];
            } else {
                // Otherwise, move up to the next level and continue the loop
                $refereeID = $result['referrer_id'];
                $currentLevel++;
            }
        } else {
            // If no referrer found, break the loop and return null
            break;
        }
    }

    $stmt->close();
    return null;
}

function calculateLevel($conn, $playerID)
{
    // Implement the logic to calculate the level based on hierarchical structure
    // This is just a basic example, you might need to adjust based on your specific requirements
    $stmt = $conn->prepare("SELECT level FROM referrals WHERE referee_id = ?");
    $stmt->bind_param("i", $playerID);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result ? $result['level'] : 0;
}

function registerAccounts($conn, $playerID)
{
    $counts = array(0, 0);  // Initialize counts array with two zeros
    
    // Get the count of direct referrals
    $stmt = $conn->prepare("SELECT count(*) as cnt FROM referrals WHERE referrer_id = ?");
    $stmt->bind_param("i", $playerID);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $counts[0] = $result ? $result['cnt'] : 0;  // Set the first count
    
    // If there are direct referrals, get the count of their referrals
    if ($counts[0] > 0) {
        $stmt2 = $conn->prepare("SELECT COUNT(*) as cnt FROM referrals WHERE referrer_id IN (SELECT referee_id FROM referrals WHERE referrer_id = ?)");
        $stmt2->bind_param("i", $playerID);
        $stmt2->execute();
        $result2 = $stmt2->get_result()->fetch_assoc();
        $counts[1] = $result2 ? $result2['cnt'] : 0;  // Set the second count
    }

    return $counts;  // Return the counts array containing both counts
}
