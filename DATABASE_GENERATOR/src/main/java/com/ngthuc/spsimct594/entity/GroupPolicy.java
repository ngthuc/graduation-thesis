package com.ngthuc.spsimct594.entity;

import javax.persistence.*;
import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Set;

@Entity
@Table(name = "grouppolicy")
public class GroupPolicy {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "id", nullable = false)
    private Long id;

    @OneToOne
	@JoinColumn(name = "aPartOf", nullable = false)
	private Policy policy;

	@ManyToMany(cascade = { CascadeType.ALL })
	@JoinTable(
		name = "groups_policy",
		joinColumns = { @JoinColumn(name = "groupPolicyId") },
		inverseJoinColumns = { @JoinColumn(name = "organisationId") }
	)
	Set<Organisation> organisations = new HashSet<>();

	@ManyToMany(cascade = { CascadeType.ALL })
	@JoinTable(
		name = "contacts_policy",
		joinColumns = { @JoinColumn(name = "groupPolicyId") },
		inverseJoinColumns = { @JoinColumn(name = "accountId") }
	)
	Set<Account> accounts = new HashSet<>();

    @Column(name = "groupsType", length = 20)
	private String groupsType;

	@Column(name = "contactsType", length = 20)
	private String contactsType;

    public GroupPolicy() {}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Policy getPolicy() {
		return policy;
	}

	public void setPolicy(Policy policy) {
		this.policy = policy;
	}

	public Set<Organisation> getOrganisations() {
		return organisations;
	}

	public void setOrganisations(Set<Organisation> organisations) {
		this.organisations = organisations;
	}

	public Set<Account> getAccounts() {
		return accounts;
	}

	public void setAccounts(Set<Account> accounts) {
		this.accounts = accounts;
	}

	public String getGroupsType() {
		return groupsType;
	}

	public void setGroupsType(String groupsType) {
		this.groupsType = groupsType;
	}

	public String getContactsType() {
		return contactsType;
	}

	public void setContactsType(String contactsType) {
		this.contactsType = contactsType;
	}
}
