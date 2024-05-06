<?php
class TeamManager extends DbConnect {
    public function getTeamData() {
        // Retrieve all team data from the database and return them as an array
        $query = $this->db->query('SELECT * FROM team');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getTeamMemberData() {
        // Retrieve all team member data from the database and return them as an array
        $query = $this->db->query('SELECT * FROM teammember');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

public function updateTeamData(Team $team) {
    $teamId = $team->getId();
    $sectionTitle = $team->getSectionTitle();
    $sectionSubheader = $team->getSectionSubheader();

    $query = "UPDATE team SET ";
    $setClauses = [];

    if (!empty($sectionTitle)) {
        $setClauses[] = "section_title = :sectionTitle";
    }
    if (!empty($sectionSubheader)) {
        $setClauses[] = "section_subheader = :sectionSubheader";
    }

    if (!empty($setClauses)) {
        $query .= implode(', ', $setClauses) . " WHERE id = :id";
        $stmt = $this->db->prepare($query);

        if (!empty($sectionTitle)) {
            $stmt->bindParam(':sectionTitle', $sectionTitle);
        }
        if (!empty($sectionSubheader)) {
            $stmt->bindParam(':sectionSubheader', $sectionSubheader);
        }

        $stmt->bindParam(':id', $teamId);
        $result = $stmt->execute();

        return $result;
    }
}

public function updateTeamMemberData(TeamMember $teamMember) {
    $memberId = $teamMember->getId(); 
    $memberName = $teamMember->getName();
    $memberTitle = $teamMember->getTitle();
    $memberBio = $teamMember->getBio();
    $memberPicture = $teamMember->getPicture();

    $query = "UPDATE teammember SET ";
    $setClauses = [];

    if (!empty($memberName)) {
        $setClauses[] = "name = :name";
    }
    if (!empty($memberTitle)) {
        $setClauses[] = "title = :title";
    }
    if (!empty($memberBio)) {
        $setClauses[] = "bio = :bio";
    }
    if (!empty($memberPicture)) {
        $setClauses[] = "picture = :picture";
    }

    if (!empty($setClauses)) {
        $query .= implode(', ', $setClauses) . " WHERE id = :id";
        $stmt = $this->db->prepare($query);

        if (!empty($memberName)) {
            $stmt->bindParam(':name', $memberName);
        }
        if (!empty($memberTitle)) {
            $stmt->bindParam(':title', $memberTitle);
        }
        if (!empty($memberBio)) {
            $stmt->bindParam(':bio', $memberBio);
        }
        if (!empty($memberPicture)) {
            $stmt->bindParam(':picture', $memberPicture);
        }

        $stmt->bindParam(':id', $memberId);
        $result = $stmt->execute();

        return $result;
    }
}

    public function getTeamDataById($id) {
        $query = "SELECT * FROM team WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $teamData = $stmt->fetch(PDO::FETCH_ASSOC);

        // Extract team members data
        $teamMembers = [];
        for ($i = 0; $i < 5; $i++) {
            $teamMemberData = [
                'name' => $teamData["team_member{$i}_name"],
                'title' => $teamData["team_member{$i}_title"],
                'bio' => $teamData["team_member{$i}_bio"],
                'picture' => $teamData["team_member{$i}_picture"]
            ];
            $teamMembers[] = new TeamMember($teamMemberData);
        }

        $teamPageData = [
            'sectionTitle' => $teamData['section_title'],
            'sectionSubheader' => $teamData['section_subheader'],
            'teamMembers' => $teamMembers
        ];

        $teamPage = new Team($teamPageData);
        return $teamPage;
    }
}
