<?php

namespace App\Services;

class ContentModerationService
{
    /**
     * List of violent, disturbing, and inappropriate words/phrases
     * This is a comprehensive but basic list - in production, consider using
     * a more sophisticated profanity detection library or API
     */
    private array $bannedWords = [
        // Violence and threats
        'kill', 'murder', 'death', 'die', 'suicide', 'bomb', 'explode', 'shoot', 'gun', 'weapon',
        'threat', 'threaten', 'harm', 'hurt', 'violence', 'assault', 'attack', 'fight', 'beat',
        'stab', 'cut', 'blood', 'gore', 'torture', 'abuse', 'rape', 'molest', 'pedophile',
        
        // Hate speech and discrimination
        'hate', 'racist', 'nazi', 'hitler', 'kkk', 'white supremacy', 'black supremacy',
        'faggot', 'fag', 'dyke', 'tranny', 'retard', 'retarded', 'spastic', 'cripple',
        'nigger', 'nigga', 'chink', 'gook', 'wetback', 'spic', 'kike', 'jap',
        
        // Sexual content
        'porn', 'pornography', 'xxx', 'sex', 'fuck', 'fucking', 'fucked', 'shit', 'shitty',
        'bitch', 'whore', 'slut', 'prostitute', 'hooker', 'pimp', 'dick', 'cock', 'pussy',
        'vagina', 'penis', 'boobs', 'tits', 'asshole', 'bastard', 'damn', 'hell',
        
        // Drugs and illegal activities
        'drugs', 'cocaine', 'heroin', 'marijuana', 'weed', 'cannabis', 'meth', 'crack',
        'ecstasy', 'lsd', 'pills', 'overdose', 'addict', 'dealer', 'smuggling',
        
        // Self-harm and suicide
        'suicide', 'kill myself', 'end my life', 'self harm', 'cut myself', 'hang myself',
        'overdose', 'poison', 'jump off', 'jump from', 'bridge', 'building',
        
        // Extreme profanity
        'cunt', 'motherfucker', 'fuck off', 'fuck you', 'go to hell', 'damn it',
        'son of a bitch', 'piece of shit', 'fucking hell', 'holy shit',
        
        // Cyberbullying and harassment
        'bully', 'harass', 'stalk', 'intimidate', 'blackmail', 'extort', 'revenge',
        'expose', 'leak', 'dox', 'doxxing', 'swat', 'swatting',
        
        // Terrorism and extremism
        'terrorist', 'terrorism', 'isis', 'al-qaeda', 'bombing', 'attack', 'jihad',
        'extremist', 'radical', 'anarchy', 'revolution', 'overthrow',
        
        // Additional disturbing content
        'gore', 'snuff', 'torture', 'mutilation', 'dismemberment', 'cannibalism',
        'necrophilia', 'bestiality', 'incest', 'pedophilia', 'child porn',
    ];

    /**
     * Check if content contains inappropriate words
     */
    public function containsInappropriateContent(string $content): bool
    {
        $content = strtolower($content);
        
        foreach ($this->bannedWords as $word) {
            // Use word boundaries to match complete words only
            $pattern = '/\b' . preg_quote($word, '/') . '\b/';
            if (preg_match($pattern, $content)) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Get the first inappropriate word found in content
     */
    public function getInappropriateWord(string $content): ?string
    {
        $content = strtolower($content);
        
        foreach ($this->bannedWords as $word) {
            // Use word boundaries to match complete words only
            $pattern = '/\b' . preg_quote($word, '/') . '\b/';
            if (preg_match($pattern, $content)) {
                return $word;
            }
        }
        
        return null;
    }

    /**
     * Sanitize content by replacing inappropriate words with asterisks
     */
    public function sanitizeContent(string $content): string
    {
        $sanitized = $content;
        
        foreach ($this->bannedWords as $word) {
            $pattern = '/\b' . preg_quote($word, '/') . '\b/i';
            $replacement = str_repeat('*', strlen($word));
            $sanitized = preg_replace($pattern, $replacement, $sanitized);
        }
        
        return $sanitized;
    }

    /**
     * Get a user-friendly error message for inappropriate content
     */
    public function getErrorMessage(string $content): string
    {
        $inappropriateWord = $this->getInappropriateWord($content);
        
        if ($inappropriateWord) {
            return "Your comment contains inappropriate content and cannot be posted. Please review your comment and remove any offensive language.";
        }
        
        return "Your comment contains inappropriate content and cannot be posted.";
    }

    /**
     * Validate content and return validation result
     */
    public function validateContent(string $content): array
    {
        $isValid = !$this->containsInappropriateContent($content);
        
        return [
            'is_valid' => $isValid,
            'message' => $isValid ? null : $this->getErrorMessage($content),
            'inappropriate_word' => $isValid ? null : $this->getInappropriateWord($content)
        ];
    }
}
